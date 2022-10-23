<?php

declare(strict_types=1);

namespace App\Offer\Application\Creator;

interface VisualizationCreator
{
    public function create(string $sku): void;
}
