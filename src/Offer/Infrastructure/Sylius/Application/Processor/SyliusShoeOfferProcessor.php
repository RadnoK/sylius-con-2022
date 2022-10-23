<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Sylius\Application\Processor;

use App\Offer\Application\Processor\ShoeOfferProcessor;
use Sylius\Component\Core\Repository\ProductRepositoryInterface;
use Sylius\Component\Product\Factory\ProductFactoryInterface;
use Sylius\Component\Product\Model\ProductInterface;

final class SyliusShoeOfferProcessor implements ShoeOfferProcessor
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private ProductFactoryInterface $productFactory,
    ) { }

    public function create(string $sku, int $size): void
    {
        /** @var ProductInterface $syliusProduct */
        $syliusProduct = $this->productFactory->createNew();
        $syliusProduct->setCode($sku);
        $syliusProduct->setName('Test offer ' . $sku);
        $syliusProduct->setSlug('test-offer-' . $sku);

        $this->productRepository->add($syliusProduct);
    }
}
