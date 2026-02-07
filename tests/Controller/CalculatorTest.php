<?php

namespace App\Tests\Controller;

use App\Controller\Calculator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Calculator::class)]
class CalculatorTest extends TestCase {
    public function testAdd(): void {
        $calculator = new Calculator();
        $result = $calculator->add(30, 12);

        $this->assertEquals(42, $result);
    }
}
