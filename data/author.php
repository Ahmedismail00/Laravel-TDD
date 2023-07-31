<?php

return [
    "name" => "author",
    "request_type" => "api",
    // "architecture" => "MVC",
    "fields" => [
        [
            "name"=>"name",
            "type"=>"string",
            "validation"=>[
                "required",
            ]
        ],
        [
            "name"=>"age",
            "type"=>"integer",
            "validation"=>[
                "required",
            ]
        ],
        [
            "name"=>"email",
            "type"=>"string",
            "validation"=>[
                "required",
                "email"
            ],
        ],
        [
            "name"=>"phone",
            "type"=>"string",
            "validation"=>[
                "required",
                "max:255",
            ]
        ],
        [
            "name"=>"password",
            "type"=>"string",
            "validation"=>[
                "required",
                "max:255",
                "password"
            ]
        ]
    ],
    "relations" => [
        [
            "relation_name"=>"books",
            "relation_type"=>"hasMany",
            "relation_model"=>"Book",
        ]
    ],
];
