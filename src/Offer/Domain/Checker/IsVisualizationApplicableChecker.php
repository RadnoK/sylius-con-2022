<?php

declare(strict_types=1);

namespace App\Offer\Domain\Checker;

final class IsVisualizationApplicableChecker
{
    public function check(string $sku): bool
    {
        return true;
    }
}
