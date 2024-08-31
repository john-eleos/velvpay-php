<?php

namespace Digikraaft\VelvPay;

use Digikraaft\VelvPay\Tests\TestHelper;
use Mockery as mk;
use PHPUnit\Framework\TestCase;

class BankTest extends TestCase
{
    public function setUp(): void
    {
        TestHelper::setup();
        $this->mock = mk::mock('GuzzleHttp\Client');
    }

    /** @test */
    public function it_can_return_bank_list()
    {
        $mock = mk::mock('alias:Bank');
        $mock->allows('list');
        $mock->list();
        $resp = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resp));
    }
}
