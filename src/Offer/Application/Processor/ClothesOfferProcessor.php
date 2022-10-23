<?php

declare(strict_types=1);

namespace App\Offer\Application\Processor;

interface ClothesOfferProcessor
{
    public function create(string $sku, string $size): void;
}
