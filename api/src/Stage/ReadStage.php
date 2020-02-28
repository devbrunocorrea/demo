<?php

namespace App\Stage;

use ApiPlatform\Core\GraphQl\Resolver\Stage\ReadStageInterface;

final class ReadStage implements ReadStageInterface
{
    private $readStage;

    public function __construct(ReadStageInterface $readStage)
    {
        $this->readStage = $readStage;
    }

    /**
    *   {@inheritdoc}
    */
    public function __invoke(?string $resourceClass, ?string $rootClass, string $operationName, array $context)
    {
        // You can add pre-read code here

        // Call the decorated read stage (this syntax calls the __invoke method).
        $readenObject = ($this->readStage)($resourceClass, $rootClass, $operationName, $context);
        
        // ou can add post-read code here.

        return $readenObject;
    }
}
