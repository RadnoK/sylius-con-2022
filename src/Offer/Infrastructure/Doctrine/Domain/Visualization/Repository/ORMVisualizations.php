<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Doctrine\Domain\Visualization\Repository;

use App\Offer\Domain\Visualization\Entity\Visualization;
use App\Offer\Domain\Visualization\Repository\Visualizations;
use Doctrine\ORM\EntityManagerInterface;

final class ORMVisualizations implements Visualizations
{
    public function __construct(
        private EntityManagerInterface $objectManager,
    ) { }

    public function add(Visualization $visualization): void
    {
        $this->objectManager->persist($visualization);
        $this->objectManager->flush();
    }
}
