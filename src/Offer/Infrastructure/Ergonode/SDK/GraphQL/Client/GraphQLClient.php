<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Ergonode\SDK\GraphQL\Client;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Webmozart\Assert\Assert;
use function Psl\File\read;
use function Psl\Json\encode;

final class GraphQLClient
{
    private const URI = 'https://8lines.ergonode.app/api/graphql/';

    public function __construct(
        private HttpClientInterface $client,
        private string $ergonodeApiKey,
        private SerializerInterface $serializer,
    ) { }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function query(string $queryFilePath, string $resultType, array $parameters): mixed
    {
        Assert::notEmpty($queryFilePath);

        $response = $this->client->request('POST', self::URI, [
            'headers' => [
                'X-API-KEY' => $this->ergonodeApiKey,
                'Content-Type' => 'application/json',
            ],
            'body' => encode(['query' => read($queryFilePath)]),
        ]);

        return $this->serializer->deserialize(
            data: $response->getContent(),
            type: $resultType,
            format: JsonEncoder::FORMAT,
            context: [
                ArrayDenormalizer::COLLECT_DENORMALIZATION_ERRORS => true,
            ],
        );
    }
}
