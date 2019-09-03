<?php

use App\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    /**
     * @testWith ["email@awoo.org", true]
     *           ["email@awoo.org.tw", true]
     *           ["email.tiger@tigerfly.tw", true]
     *           ["email+100@awoo.com.tw", true]
     *           ["email.@tigerfly.tw", false]
     *           ["email@tigerfly...tw", false]
     *           ["email@awoo_c.com.tw", false]
     *           ["email,email@tigerfly.tw", false]
     *           ["email@", false]
     */
    public function test_isEmail($email, $expected)
    {
        $this->assertSame($expected, Validator::isEmail($email));
        $this->assertSame(! $expected, Validator::isNotEmail($email));
    }
}
