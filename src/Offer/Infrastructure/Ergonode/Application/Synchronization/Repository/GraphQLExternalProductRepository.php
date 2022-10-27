<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Ergonode\Application\Synchronization\Repository;

use Aeon\Calendar\Gregorian\DateTime;
use App\Offer\Application\Synchronization\View\ExternalProductsView;
use App\Offer\Application\Synchronization\View\ExternalProductView;
use App\Offer\Domain\Synchronization\Repository\ExternalProductRepository;
use App\Offer\Infrastructure\Ergonode\SDK\GraphQL\Client\GraphQLClient;
use App\Offer\Infrastructure\Ergonode\SDK\GraphQL\Model\SimpleProductQuery;
use App\Offer\Infrastructure\Ergonode\SDK\GraphQL\Model\SimpleProductQuery\Data\ProductStream\Edge;

final class GraphQLExternalProductRepository
    implements ExternalProductRepository
{
    public function __construct(private GraphQLClient $client) { }

    public function getAllSince(DateTime $since): ExternalProductsView
    {
        /** @var SimpleProductQuery $products */
        $products = $this->client->query(
            queryFilePath: __DIR__ . '/../../../SDK/GraphQL/Query/simple_product_query.graphql',
            resultType: SimpleProductQuery::class,
            parameters: [
                "since" => $since,
            ]
        );

        return new ExternalProductsView(
            ...$this->prepareProducts($products->data->productStream->edges)
        );
    }

    /**
     * @param Edge[] $edges
     * @return ExternalProductView[]
     */
    private function prepareProducts(iterable $edges): iterable
    {
        foreach ($edges as $edge) {
            yield new ExternalProductView($edge['node']['sku']);
        }
    }
}
