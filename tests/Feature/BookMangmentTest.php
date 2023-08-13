<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookMangmentTest extends TestCase
{
    private $res;
    use RefreshDatabase;

    public function testStatus201WithMessageCreatedWhenCreatedABookWhenAuthenticated(): void
    {        
        $user = User::factory()->create();
        $res = $this->actingAs($user)->post("/api/books", $this->data());
        $res->assertCreated();
        $res->assertJson([
            'message' => 'successfully created.'
        ]);
    }

    public function testRedirectToLoginIfNotAuthenticatedWith302Status() {
        $res = $this->post("/api/books", $this->data());
        $res->assertStatus(302);
        $res->assertRedirect('/login');
    }

    public function testCountOfDatabaseInBooksTableIsOne(){
        $user = User::factory()->create();
        $this->actingAs($user)->post("/api/books", $this->data());
        $this->assertDatabaseCount('books',1);
    }

    public function testAssertValidatedCookieExistsAfterVisitingBooksRoute(){
        $user = User::factory()->create();
        $res = $this->actingAs($user)->post("/api/books", $this->data());
        $res->assertCookie('validated');
    }

    public function testLibrarianCanSeeBookCreationForm(){
        $user = User::factory()->create();
        $user->role = "librarian";
        $res = $this->actingAs($user)->get("api/books/create");
        $res->assertOk();
        $res->assertViewIs('books.create');
    }

    public function testNotLibrarianCannotSeeBookCreationForm(){
        $user = User::factory()->create();
        $user->role = "non-librarian";
        $res = $this->actingAs($user)->get("api/books/create");
        $res->assertForbidden();
    }

    

    private function data(array $data = []) : array
    {
        $author = Author::factory()->create();
        return count($data) > 0 ? $data : [
            'title' => 'The Lord of the Rings',
            'description' => 'The Lord of the Rings is an epic high-fantasy novel written by English author and scholar J. R. R. Tolkien.',
            'author_id' => $author->id,
            'ISBN' => '12B-422-24FF',
        ];
    }


}
