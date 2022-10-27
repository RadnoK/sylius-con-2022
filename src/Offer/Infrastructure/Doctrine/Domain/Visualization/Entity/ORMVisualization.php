<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Doctrine\Domain\Visualization\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

#[ORM\Entity]
final class ORMVisualization
{
    #[ORM\Column(type: 'uuid')]
    public UuidInterface $id;

    #[ORM\Column(type: 'string')]
    public string $token;

    #[ORM\Column(type: 'string')]
    public string $offerId;

    #[ORM\Column(type: 'datetime')]
    public \DateTimeImmutable $assignedAt;
}
