<?php

declare(strict_types=1);

namespace App\Offer\Domain\Synchronization\Repository;

use Aeon\Calendar\Gregorian\DateTime;
use App\Offer\Application\Synchronization\View\ExternalProductsView;

interface ExternalProductRepository
{
    public function getAllSince(DateTime $since): ExternalProductsView;
}
