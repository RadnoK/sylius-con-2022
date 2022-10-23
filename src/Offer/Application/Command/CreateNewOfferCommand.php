<?php

declare(strict_types=1);

namespace App\Offer\Application\Command;

use App\Shared\Application\Command;

final class CreateNewOfferCommand implements Command
{
    public function __construct(
        public string $sku,
    ) { }
}
