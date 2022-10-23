<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Sylius\Application\Factory;

use Sylius\Component\Product\Factory\ProductFactoryInterface;
use Sylius\Component\Product\Model\ProductInterface;

final class ClothesProductFactory implements ClothesProductFactoryInterface
{
    public function __construct(
        private ProductFactoryInterface $productFactory,
    ) { }

    public function createNew(): ProductInterface
    {
        $product = $this->productFactory->createWithVariant();
//        $product->addAttribute();

        return $product;
    }
}
