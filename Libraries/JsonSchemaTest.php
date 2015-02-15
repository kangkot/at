<?php

namespace AndyTruong\Snippets;

use JsonSchema\Validator;
use PHPUnit_Framework_TestCase;

class JsonSchemaTest extends PHPUnit_Framework_TestCase
{

    public function testScalar()
    {
        $schema = (object) ['type' => 'string'];
        $data = 'Hello JsonSchema';

        $validator = new Validator();
        $validator->check($data, $schema);

        $this->assertTrue($validator->isValid());
        $this->assertEmpty($validator->getErrors());
    }

    public function testObject()
    {
        $schema = json_decode(file_get_contents(__DIR__ . '/fixtures/person.json'));
        $data = (object) [
                'firstName' => 'Andy',
                'lastName'  => 'Truong',
                'age'       => 30];

        $validator = new Validator();
        $validator->check($data, $schema);

        $this->assertTrue($validator->isValid());
        $this->assertEmpty($validator->getErrors());
    }

}
