<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Sylius\Application\Processor;

use App\Offer\Application\Processor\ClothesOfferProcessor;

final class SyliusClothesOfferProcessor implements ClothesOfferProcessor
{
    public function create(string $sku, string $size): void
    {
        dump(self::class);
    }
}
