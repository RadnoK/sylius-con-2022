<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Sylius\Application\Factory;

use Sylius\Component\Product\Factory\ProductFactoryInterface;
use Sylius\Component\Product\Model\ProductInterface;

final class ShoeProductFactory implements ShoeProductFactoryInterface
{
    public function __construct(
        private ProductFactoryInterface $productFactory,
    ) { }

    public function createNew(): ProductInterface
    {
        return $this->productFactory->createWithVariant();
    }
}
