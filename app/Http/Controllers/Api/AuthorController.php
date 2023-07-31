<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AuthorRequest as FormRequest;
// use App\Http\Resources\Api\AuthorRequest as Resource;
use App\Models\Author as Model;
use TheGenerator\Base\Controllers\Api\GeneratorController;


class AuthorController extends GeneratorController
{
    protected $request;
    protected $model;
    protected $resource;

    public function __construct(FormRequest $request, Model $model)
    {
        parent::__construct($request, $model);
    }
}
