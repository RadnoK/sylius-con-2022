<?php

declare(strict_types=1);

namespace App\Offer\Application\Synchronization\Command;

use Aeon\Calendar\Gregorian\Calendar;
use App\Offer\Application\Synchronization\View\ExternalProductView;
use App\Offer\Domain\Synchronization\Repository\ExternalProductRepository;
use App\Shared\Application\CommandBus;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class SynchronizeProductsCommandHandler
{
    public function __construct(
        private ExternalProductRepository $externalProductRepository,
        private CommandBus $commandBus,
        private Calendar $calendar,
    ) { }

    public function __invoke(SynchronizeProductsCommand $command): void
    {
        $externalProducts = $this->externalProductRepository->getAllSince(
            $this->calendar->now()->subDay()
        );

        /** @var ExternalProductView $externalProduct */
        foreach ($externalProducts->all() as $externalProduct) {
            $this->commandBus->execute(
                new CreateNewOfferCommand($externalProduct->sku)
            );
        }
    }
}
