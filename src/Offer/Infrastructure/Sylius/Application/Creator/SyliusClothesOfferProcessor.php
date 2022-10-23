<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Sylius\Application\Creator;

use App\Offer\Application\Creator\ClothesOfferCreator;

final class SyliusClothesOfferProcessor implements ClothesOfferCreator
{
    public function create(string $sku, string $size): void
    {
        dump(self::class);
    }
}
