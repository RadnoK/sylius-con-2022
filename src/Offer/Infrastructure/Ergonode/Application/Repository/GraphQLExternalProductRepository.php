<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Ergonode\Application\Repository;

use App\Offer\Application\Repository\ExternalProductRepository;
use App\Offer\Application\View\ExternalProductsView;
use App\Offer\Application\View\ExternalProductView;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class GraphQLExternalProductRepository implements ExternalProductRepository
{
    private const URI = 'https://8lines.ergonode.app/api/graphql/';

    public function __construct(
        private HttpClientInterface $client,
    ) { }

    public function getAll(): ExternalProductsView
    {
        $json = json_encode(['query' => '']);

        $response = $this->client->request('POST', self::URI, [
            'headers' => [
                'X-API-KEY' => '9c5404f52875bbc52b1debe722d9f19ce3e036b9',
                'Content-Type' => 'application/json',
            ],
            'body' => $json,
        ]);

        dump($response->getContent());
        // TODO fetch data from Ergonode API
        return new ExternalProductsView(
            new ExternalProductView('adidas-airmax-1'),
            new ExternalProductView('nike-puma-1'),
        );
    }
}
