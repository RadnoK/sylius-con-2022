<?php

declare(strict_types=1);

namespace App\Offer\Application\Visualization\Command;

use Aeon\Calendar\Gregorian\Calendar;
use App\Offer\Application\Visualization\Repository\ProductRepository;
use App\Offer\Domain\Visualization\Entity\Visualization;
use App\Offer\Domain\Visualization\Repository\Visualizations;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class AssignVisualizationCommandHandler
{
    public function __construct(
        private ProductRepository $productRepository,
        private Visualizations $visualizations,
        private Calendar $calendar,
    ) { }

    public function __invoke(AssignVisualizationCommand $command): void
    {
        $product = $this->productRepository->get($command->productId);

        $this->visualizations->add(Visualization::create(
            $command->visualizationId,
            $command->visualizationToken,
            $product->id,
            $this->calendar->now()->toDateTimeImmutable(),
        ));
    }
}
