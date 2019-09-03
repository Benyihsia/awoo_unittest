<?php

namespace App;

class Calculator
{
    /**
     * 兩數字相加
     *
     * @param int $number1
     * @param int $number2
     * @return int
     */
    public function add($number1, $number2)
    {
        return $number1 + $number2;
    }

    /**
     * 計算面積
     *
     * @param Rectangle $rectangle
     * @return int
     */
    public function getArea(Rectangle $rectangle)
    {
        return $rectangle->getHeight() * $rectangle->getWidth();
    }
}
