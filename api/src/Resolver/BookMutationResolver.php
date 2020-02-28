<?php
namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\MutationResolverInterface;
use App\Entity\Book;

final class BookMutationResolver implements MutationResolverInterface
{
    /**
    * @param Book|null $item
    *
    * @return Book
    */
    public function __invoke($item, array $context)
    {
        // Mutation input arguments are in $context['args']['input']

        dump($context['args']['input']);

        // Do something with the book.
        // Or fetch the book if it has not been retrieved

        // The returned item will be persisted
        return $item;
    }


}
