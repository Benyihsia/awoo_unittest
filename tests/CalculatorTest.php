<?php

use App\Rectangle;
use App\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @var Calculator
     */
    private $target;

    public function setUp()
    {
        $this->target = new Calculator;
    }

    public function test_should_be_true()
    {
        $this->assertTrue(true);
    }

    public function test_should_add_two_numbers()
    {
        $number1 = 2;
        $number2 = 4;
        $expected = 6;

        $target = new Calculator;
        $actual = $target->add($number1, $number2);

        $this->assertEquals($expected, $actual);
    }

    public function test_should_calculate_area_of_rectangle()
    {
        /** @var Rectangle $rectangle */
        $rectangle = $this->createMock(Rectangle::class);

        $rectangle->method('getHeight')->willReturn(20);
        $rectangle->method('getWidth')->willReturn(3);

        $expected = 60;

        $target = new Calculator;
        $actual = $target->getArea($rectangle);

        $this->assertEquals($expected, $actual);
    }
}
