<?php

declare(strict_types=1);

namespace App\Offer\Application\Synchronization\Creator;

interface ShoeOfferCreator
{
    public function create(string $sku, int $size): void;
}
