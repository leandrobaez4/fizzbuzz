<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\Multiples;
use PHPUnit\Framework\TestCase;

final class TestMultiples extends TestCase
{
    public function testLoop()
    {
        $testMultiples = new Multiples();
        $testValue = [
            1, 2, "Fizz", 4, "Buzz", "Fizz", 7, 8, "Fizz",
            "Buzz", 11, "Fizz", 13, 14, "FizzBuzz"
        ];
        $this->assertEquals($testValue, $testMultiples->loop(1, 15));
    }
}
