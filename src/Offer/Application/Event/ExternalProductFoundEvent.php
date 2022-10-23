<?php

declare(strict_types=1);

namespace App\Offer\Application\Event;

use App\Shared\Application\Event;

final class ExternalProductFoundEvent implements Event
{
    public function __construct(
        public string $id,
    ) { }
}
