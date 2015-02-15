<?php

namespace AndyTruong\Snippets\Testcase;

use AndyTruong\Puller\Extension\WebPagePuller;
use AndyTruong\Puller\Extension\WebPagePuller\Params;
use Doctrine\Common\Annotations\AnnotationRegistry;
use PHPUnit_Framework_TestCase;
use Symfony\Component\Validator\Validation;

class SymfonyValidatorTest extends PHPUnit_Framework_TestCase
{

    protected function getValidator()
    {
        $vendor_dir = dirname(__DIR__) . '/vendor';
        $namespace = 'Symfony\\Component\\Validator\\Constraints\\';
        $directory = $vendor_dir . '/symfony/validator';
        AnnotationRegistry::registerAutoloadNamespace($namespace, $directory);

        return Validation::createValidatorBuilder()
                ->enableAnnotationMapping()
                ->addMethodMapping('loadValidatorMetadata')
                ->getValidator();
    }

    /**
     * @dataProvider sourceStatusCode
     */
    public function testStatusCode($url, $code)
    {
        $params = new Params();
        $params->setParam('url', $url);
        $params->setParam('triggerName', 'status');

        $puller = new WebPagePuller($this->getValidator());
        $this->assertEquals($code, $puller->execute($params));
    }

    public function sourceStatusCode()
    {
        return [
            ['http://v3k.net/', 301],
            ['http://www.v3k.net/', 200]
        ];
    }

}
