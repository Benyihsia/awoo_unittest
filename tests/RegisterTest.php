<?php

use App\Register;
use App\Model\User;
use PHPUnit\Framework\TestCase;

class RegisterTest extends TestCase
{
    /**
     * @var Register
     */
    private $target;

    public function setUp()
    {
        $this->user = $this->createMock(User::class);

        $this->target = new Register($this->user);
    }

    public function test_should_return_error_when_username_is_empty()
    {
        $givenRequest = [
            // 沒有 username
            'gender' => '男',
        ];

        $expected = "username is empty.";
        $actual = $this->target->register($givenRequest);

        $this->assertEquals($expected, $actual);
    }

    public function test_should_transform_gender_to_description()
    {
        $givenRequest = [
            'username' => 'Ben',
            'gender' => '男',
            'birthday' => '1999-01-01',
        ];

        $expected = [
            'username' => 'Ben',
            'gender' => '0',
            'birthday' => '1999-01-01',
        ];

        $this->user->expects($this->once())->method('createUser')->with($expected);

        $this->target->register($givenRequest);
    }
}
