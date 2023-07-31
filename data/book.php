<?php

return [
    // Name for Model, Route, Controller, View, Migration, Factory, Seeder, Test, Observer, Request, Resource, Repository, Services
    "name" => "book",
    'request_type' => 'api',
    // "architecture" => "MVC",
    "fields" => [
        [
            "name" => "title",
            "type" => "string",
            "validation" => [
                "required",
            ]
        ],
        [
            "name" => "description",
            "type" => "string",
            "validation" => [
                "required",
            ]
        ],
        [
            "name" => "author_id",
            "type" => "integer",
            "options" => ['unsigned'],
            "validation" => [
                "required",
            ]
        ],
        [
            "name" => "ISBN",
            "type" => "string",
            "validation" => [
                "required",
            ]
        ],
    ],
    "relations" => [
        [
            "relation_name" => "author",
            "relation_type" => "belongsTo",
            "relation_model" => "Author",
        ],
    ],
    "optional_options" => [
        // "soft_deletes" => true,
        // "observer"=> true,
        // "resource"=> true,
        // "seeder"=> true,
        // "factory"=> true,
        // "test"=> true,
        // "repository"=> true,
        // "services"=> true,
    ]
];
