<?php

namespace Digikraaft\VelvPay\Tests;

use Digikraaft\VelvPay\ApiOperations\Request;
use Digikraaft\VelvPay\Exceptions\InvalidArgumentException;
use Mockery as mk;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    /**
     * @throws InvalidArgumentException
     */
    public function setUp(): void
    {
        TestHelper::setup();
    }

    /** @test */
    public function it_can_return_exception_when_params_is_empty_array_and_required()
    {
        $this->expectException(InvalidArgumentException::class);
        Request::validateParams([], true);
    }

    /** @test */
    public function it_can_return_exception_when_params_is_not_array_and_required()
    {
        $this->expectException(InvalidArgumentException::class);
        Request::validateParams('string', true);
    }

    /** @test */
    public function it_can_return_exception_when_params_is_not_array_and_not_required()
    {
        $this->expectException(InvalidArgumentException::class);
        Request::validateParams('string');
    }

    /** @test */
    public function it_can_return_object_from_api_response()
    {
        $mock = mk::mock('alias:Request');
        $mock->allows('staticRequest')
            ->with(mk::type('string'), mk::type('string'), mk::type('array'), mk::type('string'));
        $mock->staticRequest('get', 'service/general/bank-list', ['params'], 'sometype');
        $resource = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resource));
    }

    /** @test */
    public function it_can_return_array_from_api_response()
    {
        $mock = mk::mock('alias:Request');
        $mock->allows('staticRequest')
            ->with(mk::type('string'), mk::type('string'), mk::type('array'), mk::type('string'));
        $mock->staticRequest('get', 'service/general/bank-list', ['params'], 'arr');
        $resource = $mock->expects([]);
        $this->assertEquals('array', gettype([$resource]));
    }

}
