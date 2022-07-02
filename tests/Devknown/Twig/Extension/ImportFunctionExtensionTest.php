<?php

namespace Devknown\Twig\Extension;

class ImportFunctionExtensionTest extends \PHPUnit\Framework\TestCase
{
    private $twig;
    private $twigExt;

    protected function setUp(): void
    {
        $this->twigExt = new \Devknown\Twig\Extension\ImportFunctionExtension();
        $loader = new \Twig\Loader\ArrayLoader([
            'md5'   => '{{ md5("devknown") }} is md5 of devknown.',
            'floor' => '{{ floor(7.7) }} is floor of 7.7.',
            'ceil'  => '{{ ceil(6.7) }} is ceil of 6.7.',
        ]);

        $this->twig = new \Twig\Environment($loader);
        $this->twig->addExtension($this->twigExt);
    }

    /**
     * @dataProvider renderProvider
     */
    public function testRenderedOutput($key, $expected)
    {
        $this->assertEquals(
            $this->twig->render($key),
            $expected
        );
    }

    public function testImportFunction()
    {
        $this->assertNull($this->twigExt->import('allowed_function'));
    }

    public function testConstructorWithImportedFunction()
    {
        $twigExt = new \Devknown\Twig\Extension\ImportFunctionExtension(['sha1', 'md5']);

        $this->assertInstanceOf(\Devknown\Twig\Extension\ImportFunctionExtension::class, $twigExt);
    }

    public function renderProvider()
    {
        return [
            ['md5', 'b9b2113d258bb18e115ca35f43c37602 is md5 of devknown.'],
            ['floor', '7 is floor of 7.7.'],
            ['ceil', '7 is ceil of 6.7.'],
        ];
    }
}
