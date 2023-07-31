<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookMangmentTest extends TestCase
{
    private $response;
    use RefreshDatabase;

    public function testStatus201WithMessageCreatedWhenCreatedABook(): void
    {
        // Laravel has its own exception handling that it doesnt throw the error as it it modifies it for better UX
        // $this->withoutExceptionHandling();

        $this->response->assertCreated();
        $this->response->assertJson([
            'message' => 'successfully created.'
        ]);
    }

    public function testCountOfDatabaseInBooksTableIsOne(){
        $this->assertDatabaseCount('books',1);
    }


    protected function setUp(): void
    {
        parent::setUp();
        $this->response = $this->post("/api/books", $this->data());
    }

    private function data(array $data = []) : array
    {
        return count($data) > 0 ? $data : [
            'title' => 'The Lord of the Rings',
            'description' => 'The Lord of the Rings is an epic high-fantasy novel written by English author and scholar J. R. R. Tolkien.',
            'author_id' => '1',
            'ISBN' => '12B-422-24FF',
        ];
    }


}
