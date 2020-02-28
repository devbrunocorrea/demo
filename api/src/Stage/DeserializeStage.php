<?php

namespace App\Stage;

use ApiPlatform\Core\GraphQl\Resolver\Stage\DeserializeStageInterface;

final class DeserializeStage implements DeserializeStageInterface
{
    private $deserializeStage;

    public function __construct(DeserializeStageInterface $deserializeStage)
    {
        $this->deserializeStage = $deserializeStage;
    }

    /**
    *   {@inheritdoc}
    */
    public function __invoke($objectToPopulate, string $resourceClass, string $operationName, array $context)
    {
        // You can add pre-deserialize code here

        // Call the decorated deserialize stage (this syntax calls the __invoke method).
        $deserializenObject = ($this->deserializeStage)($objectToPopulate, $resourceClass, $operationName, $context);
        // ou can add post-deserialize code here.

        return $deserializenObject;
    }
}
