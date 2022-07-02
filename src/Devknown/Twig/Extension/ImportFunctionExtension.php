<?php

namespace Devknown\Twig\Extension;

/**
 * ImportFunctionExtension class
 *
 * @author Hassan Azzi <devknown@gmail.com>
 */
class ImportFunctionExtension extends \Twig\Extension\AbstractExtension
{
    private $functions = [
        'uniqid',
        'floor',
        'ceil',
        'addslashes',
        'chr',
        'chunk_​split',
        'convert_​uudecode',
        'crc32',
        'crypt',
        'hex2bin',
        'md5',
        'sha1',
        'strpos',
        'strrpos',
        'ucwords',
        'wordwrap',
        'gettype',
    ];

    /**
     * __construct function
     *
     * @param  array $functions
     */
    public function __construct(array $functions = [])
    {
        if ($functions) {
            $this->import($functions);
        }
    }

    /**
     * getFunctions
     *
     * @return object
     */
    public function getFunctions()
    {
        $twigFunctions = [];

        foreach ($this->functions as $function) {
            $twigFunctions[] = new \Twig\TwigFunction($function, $function);
        }

        return $twigFunctions;
    }

    /**
     * Import
     *
     * @param  string|array $functions
     * @return void
     */
    public function import($functions)
    {
        if (is_array($functions) && !empty($functions)) {
            $this->functions = array_merge($this->functions, $functions);
        } else {
            $this->functions[] = $functions;
        }
    }
}
