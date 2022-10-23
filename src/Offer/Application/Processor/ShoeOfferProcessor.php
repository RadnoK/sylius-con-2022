<?php

declare(strict_types=1);

namespace App\Offer\Application\Processor;

use App\Offer\Application\Creator\ShoeOfferCreator;
use App\Offer\Application\Creator\VisualizationCreator;
use App\Offer\Domain\Checker\IsVisualizationApplicableChecker;

final class ShoeOfferProcessor
{
    public function __construct(
        private ShoeOfferCreator $offerCreator,
        private IsVisualizationApplicableChecker $visualizationApplicableChecker,
        private VisualizationCreator $visualizationCreator,
    ) { }

    public function process(string $sku, int $size): void
    {
        $this->offerCreator->create($sku, $size);

        if ($this->visualizationApplicableChecker->check($sku)) {
            $this->visualizationCreator->create($sku);
        }
    }
}
