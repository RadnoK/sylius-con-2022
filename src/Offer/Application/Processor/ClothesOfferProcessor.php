<?php

declare(strict_types=1);

namespace App\Offer\Application\Processor;

use App\Offer\Application\Creator\ClothesOfferCreator;

final class ClothesOfferProcessor
{
    public function __construct(
        private ClothesOfferCreator $offerCreator,
    ) { }

    public function process(string $sku, string $size): void
    {
        $this->offerCreator->create($sku, $size);
    }
}

