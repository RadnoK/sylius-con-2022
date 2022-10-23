<?php

declare(strict_types=1);

namespace App\Offer\Application\Event\Handler;

use App\Offer\Application\Command\CreateNewOfferCommand;
use App\Offer\Application\Event\ExternalProductFoundEvent;
use App\Shared\Application\CommandBus;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class ExternalProductFoundHandler
{
    public function __construct(
        private CommandBus $commandBus,
    ) { }

    public function __invoke(ExternalProductFoundEvent $event): void
    {
        $this->commandBus->execute(new CreateNewOfferCommand($event->id));
    }
}
