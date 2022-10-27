<?php

declare(strict_types=1);

namespace App\Offer\Application\Synchronization\Creator;

interface ClothesOfferCreator
{
    public function create(string $sku, string $size): void;
}
