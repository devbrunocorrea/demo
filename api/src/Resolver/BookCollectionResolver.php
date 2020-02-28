<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\QueryCollectionResolverInterface;
use App\Entity\Book;

final class BookCollectionResolver implements QueryCollectionResolverInterface
{
    /**
    * @param iterable<Book> $collection
    *
    * @return iterable<Book>
    */
    public function __invoke(iterable $collection, array $context): iterable
    {
        // Query arguments are in $context['args']
        // dump($collection);
        foreach ($collection as $book) {
            // Do something with the book
        }

        return $collection;
    }
}
