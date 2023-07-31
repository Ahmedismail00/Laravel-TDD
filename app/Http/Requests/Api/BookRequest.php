<?php

namespace App\Http\Requests\Api;

use App\Rules\Isbn;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':{
                    return [];
                }
            case 'POST':{
                    return [
						'title' => 'required',
						'description' => ['required','min:10'],
						'author_id' => 'required|exists:authors,id',
						'ISBN' => [new Isbn()],
                    ];
                }
            case 'PUT':{
                    return [
						'title' => 'required',
						'description' => 'required|min:10',
						'author_id' => 'required',
                    ];
                }
        }
    }

    public function messages()
    {
        return [
            "title.required" => "Title is required",
            "description.required" => "Description is required",
            "description.min" => "Description must be at least 10 characters",
            "author_id.required" => "Author is required",
            "author_id.exists" => "Author must be valid",
        ];
    }
}
