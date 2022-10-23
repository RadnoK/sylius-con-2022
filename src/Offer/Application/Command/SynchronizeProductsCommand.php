<?php

declare(strict_types=1);

namespace App\Offer\Application\Command;

use App\Shared\Application\Command;
use Ramsey\Uuid\UuidInterface;

final class SynchronizeProductsCommand implements Command
{
    public function __construct(
        public UuidInterface $requestId,
        public string $source,
    ) { }
}
