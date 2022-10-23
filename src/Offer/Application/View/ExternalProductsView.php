<?php

declare(strict_types=1);

namespace App\Offer\Application\View;

final class ExternalProductsView
{
    private iterable $externalProductViews;

    public function __construct(ExternalProductView ...$externalProductViews)
    {
        $this->externalProductViews = $externalProductViews;
    }

    /**
     * @return iterable<ExternalProductView[]>
     */
    public function all(): iterable
    {
        return $this->externalProductViews;
    }
}
