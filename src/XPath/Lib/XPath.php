<?php

namespace GithzlXPath\Lib;


class XPath{

    public $text; // 整个html文档的文本

    public function __construct($text = null)
    {
        $this->text = $text;
    }

    public static function test()
    {
        return 'this is test';
    }
}
