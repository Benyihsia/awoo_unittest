<?php

namespace App;

class Rectangle
{
    /**
     * 取得高
     *
     * @return int
     */
    public function getHeight()
    {
        return $_POST['height'];
    }

    /**
     * 取得寬
     *
     * @return int
     */
    public function getWidth()
    {
        return $_POST['width'];
    }
}
