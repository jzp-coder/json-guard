<?php

namespace JzpCoder\JsonGuard\Factory;

use JzpCoder\JsonGuard\Constraint\IsNumeric;
use League\JsonGuard\Assert;
use League\JsonGuard\RuleSet\DraftFour;
use League\JsonGuard\Validator;
use League\JsonReference\JsonDecoder\JsonDecoder;
use League\JsonReference\Loader\FileLoader;

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

        $ruleset = new DraftFour();
        $ruleset->set('isNumeric', function() {
            return new IsNumeric();
        });

        return new Validator(json_decode($data), $schema, $ruleset);
    }
}