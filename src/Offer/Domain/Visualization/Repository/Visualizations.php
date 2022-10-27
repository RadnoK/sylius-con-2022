<?php

declare(strict_types=1);

namespace App\Offer\Domain\Visualization\Repository;

use App\Offer\Domain\Visualization\Entity\Visualization;

interface Visualizations
{
    public function add(Visualization $visualization): void;
}
