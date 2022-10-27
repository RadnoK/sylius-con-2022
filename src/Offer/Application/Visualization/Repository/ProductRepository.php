<?php

declare(strict_types=1);

namespace App\Offer\Application\Visualization\Repository;

use App\Offer\Application\Visualization\View\ProductView;

interface ProductRepository
{
    public function get(string $sku): ProductView;
}
