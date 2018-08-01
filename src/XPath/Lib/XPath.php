<?php

namespace GithzlXPath\Lib;

use GithzlXPath\Lib\XPathCommon;

class XPath extends XPathCommon {

    public $charset;

    public $xpath; // xpath对象

    public function __construct($text = null,$charset = 'UTF-8')
    {
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $html = mb_convert_encoding($text ,'HTML-ENTITIES',"UTF-8"); // 解决中文乱码问题
        $dom->loadHTML($html);
        $this->xpath = new \DOMXPath($dom);
    }

    public function init()
    {
        if(!class_exists('\DOMDocument'))
        {
            throw new \Exception("XPath class need DOMDocument class");
        }

        if(!class_exists('\DOMXPath'))
        {
            throw new \Exception("XPath class need DOMXPath class");
        }

        if(!function_exists('mb_convert_encoding'))
        {
            throw new \Exception("XPath class need mb_convert_encoding function");
        }

        if(!function_exists('libxml_use_internal_errors'))
        {
            throw new \Exception("XPath class need libxml_use_internal_errors function");
        }

    }

    public static function test()
    {
        return 'test succ!!!';
    }
}

