<?php

declare(strict_types=1);

namespace App\Offer\Application\Visualization\Command;

use App\Shared\Application\Command;
use Ramsey\Uuid\UuidInterface;

final class AssignVisualizationCommand implements Command
{
    public function __construct(
        public UuidInterface $visualizationId,
        public string $visualizationToken,
        public string $sku,
    ) { }
}
