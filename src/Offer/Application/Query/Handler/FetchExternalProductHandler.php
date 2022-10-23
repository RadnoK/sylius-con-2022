<?php

declare(strict_types=1);

namespace App\Offer\Application\Query\Handler;

use App\Offer\Application\Query\FetchExternalProductQuery;
use App\Offer\Application\Repository\ExternalProductRepository;
use App\Offer\Application\View\ExternalProductsView;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class FetchExternalProductHandler
{
    public function __construct(
        private ExternalProductRepository $externalProductRepository,
    ) { }

    public function __invoke(FetchExternalProductQuery $query): ExternalProductsView
    {
        return $this->externalProductRepository->getAll();
    }
}
