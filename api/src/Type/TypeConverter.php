<?php

namespace App\Type;

use ApiPlatform\Core\GraphQl\Type\TypeConverterInterface;
use App\Model\Book;
use Symfony\Component\PropertyInfo\Type;
use GraphQL\Type\Definition\Type as GraphQLType;

final class TypeConverter implements TypeConverterInterface
{
    private $defaultTypeConverter;

    public function __construct(TypeConverterInterface $defaultTypeConverter)
    {
        $this->defaultTypeConverter = $defaultTypeConverter;
    }

    /**
    * {@inheritdoc}
    */
    public function convertType(Type $type, bool $input, ?string $queryName, ?string $mutationName, string $resourceClass, string $rootResource, ?string $property, int $depth)
    {
        // if ('publicationDate' === $property && Book::class === $resourceClass) {
        //     return 'DateTime';
        // }

        if (Type::BUILTIN_TYPE_OBJECT === $type->getBuiltinType() && is_a($type->getClassName(), \DateTimeInterface::class, true)) {
            return 'DateTime';
        }

        return $this->defaultTypeConverter->convertType($type, $input, $queryName, $mutationName, $resourceClass, $rootResource, $property, $depth);
    }

    public function resolveType(string $type): ?GraphQLType
    {
        return $this->defaultTypeConverter->resolveType($type);
    }
}
