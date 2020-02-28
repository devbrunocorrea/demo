<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\QueryItemResolverInterface;
use App\Entity\Review;

final class ReviewResolver implements QueryItemResolverInterface
{
    public function __invoke($item, array $context)
    {
        return $item;
    }
}
