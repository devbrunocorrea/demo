<?php
namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\MutationResolverInterface;
use App\Entity\Review;

final class ReviewMutationResolver implements MutationResolverInterface
{
    /**
    * @param Review|null $item
    *
    * @return Review
    */
    public function __invoke($item, array $context)
    {
        // Mutation input arguments are in $context['args']['input']

        // Do something with the review.
        // Or fetch the book if it has not been retrieved

        // The returned item will be persisted
        return $item;
    }


}
