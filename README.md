[![Build Status](https://travis-ci.org/jzp-coder/json-guard.svg?branch=master)](https://travis-ci.org/jzp-coder/json-guard)

### About
This bundle integrates `league/json-guard` with Symfony and offers a light builder for `League\JsonGuard\Validator` instance.
### Install
`composer require jzp-coder/json-guard`
### Configuration
For now, the bundle requires only the folder path where the JSON schemas are stored:
```yaml
json_guard:
    json_schema_root_path: '%kernel.root_dir%/../config/schemas/'
```
### Usage
Assuming that the `json_schema_root_path` is set and inside is a `test.json` schema, you could use the JSON builder like this:
```php
    public function test(\JzpCoder\JsonGuard\Builder\JsonValidatorBuilder $builder)
    {
        $data = <<<EOF
{
    "eanCode": '123',
}
EOF;
        $validator = $builder->setJsonSchema('test')
            ->setData($data)
            ->build();

        return new Response($validator->passes());
    }
```   
There's also a new constraint added, `isNumeric`, which validates that a value is numeric or not. So, `'123'` and `123` values will pass, but if `isNumeric` is set to `false`, then `123` and `'123'` values will not pass. See a small example of JSON schema below:
```json
{
    "properties": {
        "eanCode": {
            "type": ["integer", "string"],
            "isNumeric": true
        }
    }
}
```
### Testing
`vendor/bin/phpspec run`
### Features to be added
An option for caching the schemas will be added soon.

### Contributing
If you want to contribute, please fork the repo and create a pull request from your custom branch to master. Thanks!
