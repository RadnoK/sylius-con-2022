<?php

declare(strict_types=1);

namespace App\Offer\Application\Repository;

use App\Offer\Application\View\ExternalProductsView;

interface ExternalProductRepository
{
    public function getAll(): ExternalProductsView;
}
