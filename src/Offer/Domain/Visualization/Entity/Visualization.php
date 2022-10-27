<?php

declare(strict_types=1);

namespace App\Offer\Domain\Visualization\Entity;

use Ramsey\Uuid\UuidInterface;

final class Visualization
{
    public UuidInterface $id;

    public string $token;

    public string $productId;

    public \DateTimeImmutable $assignedAt;

    public function __construct(UuidInterface $id, string $token, string $productId, \DateTimeImmutable $assignedAt)
    {
        $this->id = $id;
        $this->token = $token;
        $this->productId = $productId;
        $this->assignedAt = $assignedAt;
    }

    public static function create(
        UuidInterface $visualizationId,
        string $visualizationToken,
        string $productId,
        \DateTimeImmutable $assignedAt,
    ): self {
        return new self($visualizationId, $visualizationToken, $productId, $assignedAt);
    }
}
