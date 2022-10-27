<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Sylius\Application\Synchronization\Factory;

use Sylius\Component\Product\Model\ProductInterface;

interface ClothesProductFactoryInterface
{
    public function createNew(): ProductInterface;
}
