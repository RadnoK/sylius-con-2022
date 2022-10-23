<?php

declare(strict_types=1);

namespace App\Offer\Domain\Checker;

/*
 * Write here your custom logic about checking if the product is from Shoes category based on the SKU
 * (imaginary scenario :)) )
 */
final class IsShoesSkuChecker
{
    public function check(string $value): bool
    {
        return \str_contains($value, 'airmax');
    }
}
