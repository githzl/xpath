<?php

namespace GithzlXPath\Lib;

class XPathCommon{

    public static $DomNodeList;

    public static $query;
    /**
     * 发送Query至XPath
     * 返回：DomNodeList对象
     */
    public function query($expression, $contextnode = null, $registerNodeNS = true)
    {
        if(!$expression){
            throw new \Exception('query function need param expression');
        }
        static::$query = $expression;
        static::$DomNodeList = $this->xpath->query($expression, $contextnode, $registerNodeNS);
        return $this;
    }

    /**
     * 获取当前节点的值
     * <p>人生就是一杯酒</p>
     * 返回：节点的值
     */
    public function getNodeValue()
    {
        return static::$DomNodeList[0]->nodeValue;
    }

    /**
     * 获取当前节点的属性之前 比如：href
     * <a hrf='http://www.totmp.com'>跳转</a>
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
     * <title>这是标题</title>
     * 注意：如果获取不到，请自行分析页面结构是否正常
     * 返回：值
     */
    public function getTitle()
    {
        return $this->xpath->query('/html/head/title[1]')[0]->nodeValue;
    }

    /**
     * 获取节点下第一个子节点
     * 参数：子节点的标签名字
     * <ul>
     * <li>北京</li>
     * <li>上海</li>
     * </ul>
     * 返回：第一个子节点的Value值 (北京)
     */
    public function getFirstChildNodeValue($tag)
    {
        if(!$tag){
            throw new \Exception('getFirstChildNodeValue function need param tag');
        }
        $query = static::$query.'/'.$tag;
        $FirstChildNodeValue = $this->xpath->query($query)[0]->nodeValue;
        return $FirstChildNodeValue;
    }

    /**
     * 获取节点下最后一个子节点
     * 参数：子节点的标签名字
     * <ul>
     * <li>北京</li>
     * <li>上海</li>
     * </ul>
     * 返回：最后一个子节点的Value值 (上海)
     */
    public function getLastChildNodeValue($tag)
    {
        if(!$tag){
            throw new \Exception('getFirstChildNodeValue function need param tag');
        }
        $query = static::$query.'/'.$tag;
        $length = $this->xpath->query($query)->length;
        $LastChildNodeValue = $this->xpath->query($query)[$length-1]->nodeValue;
        return $LastChildNodeValue;
    }

    /**
     * 获取节点下所有子节点的值
     * <ul>
     * <li>北京</li>
     * <li>上海</li>
     * </ul>
     * 返回：数组形式返回所有子节点的Value值 ['北京','上海']
     */
    public function getAllChildNodeValue($tag)
    {
        if(!$tag){
            throw new \Exception('getFirstChildNodeValue function need param tag');
        }
        $arr = [];
        $query = static::$query.'/'.$tag;
        foreach ($this->xpath->query($query) as $item){
            $arr[] = $item->nodeValue;
        }
        return $arr;
    }

    /**
     * 获取节点下所有子节点个数
     * <ul>
     * <li>北京</li>
     * <li>上海</li>
     * </ul>
     * 返回：int 2
     */
    public function getAllChildNodeCount($tag)
    {
        if(!$tag){
            throw new \Exception('getFirstChildNodeValue function need param tag');
        }
        $query = static::$query.'/'.$tag;
        $count = $this->xpath->query($query)->length;
        return $count;
    }
}


