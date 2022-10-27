<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Sylius\Application\Visualization\Repository;

use App\Offer\Application\Visualization\Repository\ProductRepository;
use App\Offer\Application\Visualization\View\ProductView;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Core\Repository\ProductRepositoryInterface;

final class SyliusProductRepository implements ProductRepository
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
    ) { }

    public function get(string $sku): ProductView
    {
        /** @var ProductInterface $product */
        $product = $this->productRepository->findOneByCode($sku);

        return new ProductView($product->getId());
    }
}
