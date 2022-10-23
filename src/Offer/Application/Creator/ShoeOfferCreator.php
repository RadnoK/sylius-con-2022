<?php

declare(strict_types=1);

namespace App\Offer\Application\Creator;

interface ShoeOfferCreator
{
    public function create(string $sku, int $size): void;
}
