<?php

namespace GithzlXPath\Lib;

class XPathCommon{

    public static $DomNodeList;

    /**
     * 发送Query至XPath
     * 返回：DomNodeList对象
     */
    public function query($expression, $contextnode = null, $registerNodeNS = true)
    {
       static::$DomNodeList = $this->xpath->query($expression, $contextnode, $registerNodeNS);
       return $this;
    }

    /**
     * 获取当前节点的值
     * 返回：节点的值
     */
    public function getNodeValue()
    {
        return static::$DomNodeList[0]->nodeValue;
    }

    /**
     * 获取当前节点的属性之前 比如：href
     * 参数：属性名（$attribute）
     * 返回：属性值
     */
    public function getAttrValue($attribute)
    {
        if(!$attribute){
            throw new \Exception('getFirstAttrValue function need param attribute');
        }
        return static::$DomNodeList[0]->attributes->getNamedItem($attribute)->nodeValue;
    }

    /**
     * 获取当前文本的title
     * 注意：如果获取不到，请自行分析页面结构是否正常
     * 返回：值
     */
    public function getTitle()
    {
        return $this->xpath->query('/html/head/title[1]')[0]->nodeValue;
    }
}

