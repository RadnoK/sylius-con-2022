<?php

declare(strict_types=1);

namespace App\Offer\Application\Command\Handler;

use App\Offer\Application\Command\CreateNewOfferCommand;
use App\Offer\Application\Processor\ClothesOfferProcessor;
use App\Offer\Application\Processor\ShoeOfferProcessor;
use App\Offer\Domain\Checker\IsClothesSkuChecker;
use App\Offer\Domain\Checker\IsShoesSkuChecker;
use App\Offer\Domain\Exception\SkuCategoryNotRecognizedException;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class CreateNewOfferHandler
{
    public function __construct(
        private IsShoesSkuChecker $isShoesSkuChecker,
        private ShoeOfferProcessor $shoeOfferFactory,
        private IsClothesSkuChecker $isClothesSkuChecker,
        private ClothesOfferProcessor $clothesOfferFactory,
    ) { }

    /**
     * @throws SkuCategoryNotRecognizedException
     */
    public function __invoke(CreateNewOfferCommand $command): void
    {
        if ($this->isShoesSkuChecker->check($command->sku)) {
            $this->shoeOfferFactory->create($command->sku, 46);

            return;
        }

        if ($this->isClothesSkuChecker->check($command->sku)) {
            $this->clothesOfferFactory->create($command->sku, 'M');

            return;
        }

        throw new SkuCategoryNotRecognizedException();
    }
}
