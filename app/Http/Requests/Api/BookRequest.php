<?php

namespace App\Http\Requests\Api;

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
						'description' => 'required',
						'author_id' => 'required',
						'ISBN' => 'required',
                    ];
                }
            case 'PUT':{
                    return [
						'title' => 'required',
						'description' => 'required',
						'author_id' => 'required',
						'ISBN' => 'required',
                    ];
                }
        }
    }

    public function messages()
    {
        return [
            "title.required" => "Title is required",
            "description.required" => "Description is required",
            
        ];
    }
}
