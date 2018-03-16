<?php

namespace JzpCoder\JsonGuard\Builder;

use JzpCoder\JsonGuard\Constraint\IsNumeric;
use League\JsonGuard\RuleSet\DraftFour;
use League\JsonGuard\Validator;
use League\JsonReference\JsonDecoder\JsonDecoder;
use League\JsonReference\Loader\FileLoader;

class JsonValidatorBuilder
{
    private $data;

    private $schema;

    private $schemaRootPath;

    public function __construct(string $schemaRootPath)
    {
        $this->schemaRootPath = $schemaRootPath;
    }

    public function setData(string $data) : self
    {
        $this->data = $data;

        return $this;
    }

    public function setJsonSchema(string $schema) : self
    {
        $this->schema = (new FileLoader(new JsonDecoder()))
            ->load($this->schemaRootPath . $schema . '.json');

        return $this;
    }

    public function build() : Validator
    {
        $ruleset = new DraftFour();
        $ruleset->set('isNumeric', function() {
            return new IsNumeric();
        });

        return new Validator(json_decode($this->data), $this->schema, $ruleset);
    }
}