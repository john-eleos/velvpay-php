<?php

namespace Digikraaft\VelvPay\Tests;

use Digikraaft\VelvPay\Exceptions\InvalidArgumentException;
use Digikraaft\VelvPay\VelvPay;

class TestHelper
{
    /**
     * @throws InvalidArgumentException
     */
    public static function setup(): void
    {
        VelvPay::$apiBase = 'https://api.velvpay.com/api/v1';
        VelvPay::setkeys('sk_secretkey', 'pk_test_12345', 'enckey12345');
    }
}
