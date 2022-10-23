<?php

declare(strict_types=1);

namespace App\Shared\Application;

interface EventBus
{
    public function record(Event $event): void;
}
