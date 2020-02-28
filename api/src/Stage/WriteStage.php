<?php

namespace App\Stage;

use ApiPlatform\Core\GraphQl\Resolver\Stage\WriteStageInterface;

final class WriteStage implements WriteStageInterface
{
    private $writeStage;

    public function __construct(WriteStageInterface $writeStage)
    {
        $this->writeStage = $writeStage;
    }

    /**
    *   {@inheritdoc}
    */
    public function __invoke($data, string $resourceClass, string $operationName, array $context)
    {
        // You can add pre-write code here

        // Call the decorated write stage (this syntax calls the __invoke method).
        $writtenObject = ($this->writeStage)($data, $resourceClass, $operationName, $context);
        // ou can add post-write code here.

        return $writtenObject;
    }
}
