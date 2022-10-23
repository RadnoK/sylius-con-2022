<?php

declare(strict_types=1);

namespace App\Offer\Application\Processor;

interface ShoeOfferProcessor
{
    public function create(string $sku, int $size): void;
}
