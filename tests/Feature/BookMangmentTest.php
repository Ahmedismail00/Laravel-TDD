<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookMangmentTest extends TestCase
{
    private $response;
    use RefreshDatabase;

    public function testStatus201WithMessageCreatedWhenCreatedABookWhenAuthenticated(): void
    {
        // Laravel has its own exception handling that it doesnt throw the error as it it modifies it for better UX
        // $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post("/api/books", $this->data());
        $response->assertCreated();
        $response->assertJson([
            'message' => 'successfully created.'
        ]);
    }

    public function testRedirectToLoginIfNotAuthenticatedWith302Status() {
        $response = $this->post("/api/books", $this->data());
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testCountOfDatabaseInBooksTableIsOne(){
        $user = User::factory()->create();
        $this->actingAs($user)->post("/api/books", $this->data());
        $this->assertDatabaseCount('books',1);
    }

    public function testAssertValidatedCookieExistsAfterVisitingBooksRoute(){
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post("/api/books", $this->data());
        // dd($response);
        $response->assertCookie('validated');
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
