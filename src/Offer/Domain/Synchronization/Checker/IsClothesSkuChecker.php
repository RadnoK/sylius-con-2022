<?php

declare(strict_types=1);

namespace App\Offer\Domain\Synchronization\Checker;

/*
 * Write here your custom logic about checking if the product is from Clothes category based on the SKU
 * (imaginary scenario :)) )
 */
final class IsClothesSkuChecker
{
    public function check(string $value): bool
    {
        return true;
    }
}
