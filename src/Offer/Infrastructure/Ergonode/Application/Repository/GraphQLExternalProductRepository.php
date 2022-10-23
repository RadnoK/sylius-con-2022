<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Ergonode\Application\Repository;

use App\Offer\Application\Repository\ExternalProductRepository;
use App\Offer\Application\View\ExternalProductsView;
use App\Offer\Application\View\ExternalProductView;
use App\Offer\Infrastructure\Ergonode\SDK\GraphQL\Client\GraphQLClient;
use App\Offer\Infrastructure\Ergonode\SDK\GraphQL\Model\SimpleProductQuery;

final class GraphQLExternalProductRepository implements ExternalProductRepository
{
    public function __construct(
        private GraphQLClient $client,
    ) { }

    public function getAll(): ExternalProductsView
    {
        /** @var SimpleProductQuery $products */
        $products = $this->client->query(
            // TODO: Optimize query for selecting just SKUs from the API first, processing single product is later
            queryFilePath: __DIR__ . '/../../SDK/GraphQL/Query/simple_product_query.graphql',
            resultType: SimpleProductQuery::class,
        );

        return new ExternalProductsView(...$this->prepareProducts($products->data->productStream->edges));
    }

    /**
     * @return iterable|ExternalProductView[]
     */
    private function prepareProducts(iterable $edges): iterable
    {
        foreach ($edges as $edge) {
            yield new ExternalProductView($edge['node']['sku']);
        }
    }
}
