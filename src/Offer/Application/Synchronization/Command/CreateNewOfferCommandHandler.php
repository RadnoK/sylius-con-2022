<?php

declare(strict_types=1);

namespace App\Offer\Application\Synchronization\Command;

use App\Offer\Application\Synchronization\Processor\ClothesOfferProcessor;
use App\Offer\Application\Synchronization\Processor\ShoeOfferProcessor;
use App\Offer\Domain\Synchronization\Checker\IsClothesSkuChecker;
use App\Offer\Domain\Synchronization\Checker\IsShoesSkuChecker;
use App\Offer\Domain\Synchronization\Exception\SkuCategoryNotRecognizedException;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class CreateNewOfferCommandHandler
{
    public function __construct(
        private IsShoesSkuChecker $isShoesSkuChecker,
        private ShoeOfferProcessor $shoeOfferProcessor,
        private IsClothesSkuChecker $isClothesSkuChecker,
        private ClothesOfferProcessor $clothesOfferProcessor,
    ) { }

    /**
     * @throws SkuCategoryNotRecognizedException
     */
    public function __invoke(CreateNewOfferCommand $command): void
    {
        if ($this->isShoesSkuChecker->check($command->sku)) {
            $this->shoeOfferProcessor->process($command->sku, 46);

            return;
        }

        if ($this->isClothesSkuChecker->check($command->sku)) {
            $this->clothesOfferProcessor->process($command->sku, 'M');

            return;
        }

        throw new SkuCategoryNotRecognizedException();
    }
}
