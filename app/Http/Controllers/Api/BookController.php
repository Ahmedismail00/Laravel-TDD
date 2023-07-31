<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\BookRequest as FormRequest;
use App\Models\Book as Model;
use Isayama3\TheGenerator\Base\Controllers\Api\GeneratorController as ApiGeneratorController;


class BookController extends ApiGeneratorController
{
    protected $request;
    protected $model;
    protected $resource;

    public function __construct(FormRequest $request, Model $model)
    {
        parent::__construct($request, $model);
    }
}
