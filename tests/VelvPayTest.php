<?php

namespace Digikraaft\VelvPay\Tests;

use Digikraaft\VelvPay\Exceptions\InvalidArgumentException;
use Digikraaft\VelvPay\VelvPay;
use Mockery as mk;
use PHPUnit\Framework\TestCase;

class VelvPayTest extends TestCase
{
    protected $velvpay;
    protected $mock;

    public function setUp(): void
    {
        TestHelper::setup();
        $this->velvpay = mk::mock('Digikraaft\VelvPay\VelvPay');
        $this->mock = mk::mock('GuzzleHttp\Client');
    }

    /** @test */
    public function it_returns_instance_of_velvpay()
    {
        $this->assertInstanceOf("Digikraaft\VelvPay\VelvPay", $this->velvpay);
    }

    /** @test */
    public function it_returns_invalid_keys()
    {
        $this->expectException(InvalidArgumentException::class);
        VelvPay::setKeys('', '', '');
    }

    /** @test
     * @throws InvalidArgumentException
     */
    public function it_returns_public_key()
    {
        VelvPay::setkeys('sk_secretkey', 'pk_test_12345', 'enckey12345');
        $this->assertIsString(VelvPay::getSecretKey());
    }
}
