<?php

use App\Http\Client;
use App\CheckoutController;
use PHPUnit\Framework\TestCase;

class CheckoutControllerTest extends TestCase
{
    public function setUp()
    {
        $this->client = $this->createMock(Client::class);

        $this->target = $this->getMockBuilder(CheckoutController::class)
            ->setConstructorArgs([$this->client])
            ->setMethods(['getRequest'])
            ->getMock();
    }

    public function test_should_get_payment_success()
    {
        $givenResponse = '{
            "status": true,
            "total": 1080,
            "payer": "ben",
            "credit_card": "4705-8888-8888-0001",
            "valid_in": "2019-10-10 00:00:00"
        }';

        $this->client->method('post')->willReturn($givenResponse);
        $this->target->method('getRequest')->willReturn([
            'user' => 'Ben',
        ]);

        $expected = "ben 付款成功, 金額 1080";
        $actual = $this->target->checkout();

        $this->assertEquals($expected, $actual);
    }

    public function test_should_get_payment_failed()
    {
        $givenResponse = '{
            "status": false,
            "message": "order has expired"
        }';

        $this->client->method('post')->willReturn($givenResponse);
        $this->target->method('getRequest')->willReturn([
            'user' => 'Ben',
        ]);

        $expected = "付款失敗，原因: order has expired";
        $actual = $this->target->checkout();

        $this->assertEquals($expected, $actual);
    }
}
