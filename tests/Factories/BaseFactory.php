<?php

namespace EolabsIo\GoogleAdsApi\Tests\Factories;

use EolabsIo\GoogleAdsApi\Tests\Factories\Contracts\FactoryInterface;

abstract class BaseFactory implements FactoryInterface
{
    public static function new(): self
    {
        return new static();
    }
}
