<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\QueryItemResolverInterface;
use App\Entity\Book;

final class BookResolver implements QueryItemResolverInterface
{

    /**
    * @param Book|null $item
    *
    * @return Book
    */
    public function __invoke($item, array $context)
    {
        // dump($item);
        // Query arguments are in $context['args']

        // Do something with the book.
        // Or fetch the book if it has not been retrieved.


        return $item;
    }
}
