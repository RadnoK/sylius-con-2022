<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Metaverse\Application\Creator;

use App\Offer\Application\Creator\VisualizationCreator;

final class MetaverseVisualizationCreator implements VisualizationCreator
{
    public function create(string $sku): void
    {
        dump('Creating stuff in Metaverse, hang on tight!');
    }
}
