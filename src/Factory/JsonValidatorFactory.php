<?php

namespace JzpCoder\JsonGuard\Factory;

use League\JsonGuard\Validator;
use League\JsonReference\JsonDecoder\JsonDecoder;
use League\JsonReference\Loader\CurlWebLoader;
use League\JsonReference\Loader\FileGetContentsWebLoader;
use League\JsonReference\Loader\FileLoader;
use League\JsonReference\LoaderManager;

class JsonValidatorFactory
{
    private $schemaRootPath;

    public function __construct(string $schemaRootPath)
    {
        $this->schemaRootPath = $schemaRootPath;
    }

    public function setSchemaRootPath(string $schemaRootPath)
    {
        $this->schemaRootPath = $schemaRootPath;
    }

    public function createFromLocalFile(string $data, string $filename)
    {
        $loader = new FileLoader(new JsonDecoder());
        $schema = $loader->load($this->schemaRootPath . $filename . '.json');

        return new Validator(json_decode($data), $schema);
    }
}