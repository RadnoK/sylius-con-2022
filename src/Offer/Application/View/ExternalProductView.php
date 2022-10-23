<?php

declare(strict_types=1);

namespace App\Offer\Application\View;

final class ExternalProductView
{
    public function __construct(
        public string $sku,
    ) { }
}
