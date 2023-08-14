<?php

namespace Tests\Unit;

use App\BackingClasses\Char;
use PHPUnit\Framework\TestCase;

class CharTest extends TestCase
{
  
    public function testGetCamelCaseString()
    {
        $char = new Char();
        $out = $char->getCamelCaseFromSnakeCase("Call_Of_Duty");
        self::assertEquals('callOfDuty',$out);
    }
}
