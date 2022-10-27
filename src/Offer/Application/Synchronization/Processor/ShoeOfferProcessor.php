<?php

declare(strict_types=1);

namespace App\Offer\Application\Synchronization\Processor;

use App\Offer\Application\Synchronization\Creator\ShoeOfferCreator;

final class ShoeOfferProcessor
{
    public function __construct(
        private ShoeOfferCreator $offerCreator,
    ) { }

    public function process(string $sku, int $size): void
    {
        $this->offerCreator->create($sku, $size);
    }
}
