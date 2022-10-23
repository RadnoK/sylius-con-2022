<?php

declare(strict_types=1);

namespace App\Offer\Application\Command\Handler;

use App\Offer\Application\Command\CreateNewOfferCommand;
use App\Offer\Application\Command\SynchronizeProductsCommand;
use App\Offer\Application\Event\ExternalProductFoundEvent;
use App\Offer\Application\Query\FetchExternalProductQuery;
use App\Offer\Application\View\ExternalProductsView;
use App\Offer\Application\View\ExternalProductView;
use App\Shared\Application\CommandBus;
use App\Shared\Application\EventBus;
use App\Shared\Application\QueryBus;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class SynchronizeProductsHandler
{
    public function __construct(
        private QueryBus $queryBus,
        private EventBus $eventBus,
    ) { }

    public function __invoke(SynchronizeProductsCommand $command): void
    {
        /** @var ExternalProductsView $externalProducts */
        $externalProducts = $this->queryBus->query(new FetchExternalProductQuery(1));

        /** @var ExternalProductView $externalProduct */
        foreach ($externalProducts->all() as $externalProduct) {
            $this->eventBus->record(new ExternalProductFoundEvent($externalProduct->sku));
        }
    }
}
