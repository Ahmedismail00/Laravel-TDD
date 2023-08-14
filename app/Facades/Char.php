<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string koko()
 */

Class Char extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "App\BackingClasses\Char";
    }
}