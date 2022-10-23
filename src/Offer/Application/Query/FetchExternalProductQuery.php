<?php

declare(strict_types=1);

namespace App\Offer\Application\Query;

use App\Shared\Application\Query;

final class FetchExternalProductQuery implements Query
{
    public function __construct(
        public int $first,
    ) { }
}
