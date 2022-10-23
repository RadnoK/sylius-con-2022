<?php

declare(strict_types=1);

namespace App\Offer\Infrastructure\Ergonode\SDK\GraphQL\Model\SimpleProductQuery\Data\ProductStream\Edge\Node;

final class SimpleProduct
{
    public string $sku;

    // TODO Handle it using proper object structure
    public array $attributeList;
}
