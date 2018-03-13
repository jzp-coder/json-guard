<?php

namespace JzpCoder\JsonGuard\Factory;

class JsonValidatorFactory
{
    private $schemaRootPath;

    public function __construct(string $schemaRootPath)
    {
        $this->schemaRootPath = $schemaRootPath;
    }
}