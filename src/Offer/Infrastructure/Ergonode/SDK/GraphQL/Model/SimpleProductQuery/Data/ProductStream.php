<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Ergonode\SDK\GraphQL\Model\SimpleProductQuery\Data;

use App\Offer\Infrastructure\Ergonode\SDK\GraphQL\Model\SimpleProductQuery\Data\ProductStream\Edge;

final class ProductStream
{
    // TODO other parameters like totalCount, pageInfo

    /**
     * @var array<Edge[]>
     */
    public array $edges;
}
