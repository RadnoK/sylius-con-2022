<?php

declare(strict_types=1);

namespace App\Offer\Domain\Repository;

use App\Offer\Domain\Entity\Offer;

interface Offers
{
    public function save(Offer $offer): void;
}
