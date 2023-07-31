<?php

namespace Tests\Feature;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookValidationTest extends TestCase
{
    public function testTitleIsRequired()
    {
        $respone = $this->post("/api/books",$this->data(["title" => ""]));
        $respone->assertSessionHasErrors(["title"=>"Title is required"]);
    }

    public function testDescriptionIsRequired(){
        $respone = $this->post("/api/books",$this->data(["description" => ""]));
        $respone->assertSessionHasErrors(["description"=>"Description is required"]);
    }

    public function testDescriptionMustBeAtLeast10Characters(){
        $respone = $this->post("/api/books",$this->data(["description" => "test"]));
        $respone->assertSessionHasErrors(["description"=>"Description must be at least 10 characters"]);
    }

    public function testAuthorIdMustBeValid(){ 
            $respone = $this->post("/api/books",$this->data());
            $respone->assertSessionHasErrors(["author_id"=>"Author must be valid"]);
    }

    public function testIsbnMustBEValidFormatd(){
        $respone = $this->post("/api/books",$this->data(["ISBN" => "asdsa"]));
        $respone->assertSessionHasErrors(["ISBN"=>"ISBN must be of valid format"]);
    }

    private function data(array $data = []) : array
    {
        return count($data) > 0 ? $data : [
            'title' => 'The Lord of the Rings',
            'description' => 'The Lord of the Rings is an epic high-fantasy novel written by English author and scholar J. R. R. Tolkien.',
            'author_id' => 1,
            'ISBN' => '12B-422-24FF',
        ];
    }
}
