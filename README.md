
1.快速入门



    {
        "require": {
            "githzl/xpath": "dev-master"
        }
    }
2.demo演示

    <?php

    require 'vendor/autoload.php';
    
    use GithzlXPath\Lib\XPath;
    
    $html = file_get_contents('https://www.zhipin.com'); // 获取到html  
    $xpath = new XPath($html);
    
    echo $title = $xpath->getTitle();  // BOSS直聘-互联网招聘神器！
    
    echo $link = $xpath->query('//*[@id="wrap"]/div[4]/dl/dd/a[1]')->getNodeValue(); // 慧聪网
    
    echo $attr = $xpath->query('//*[@id="wrap"]/div[4]/dl/dd/a[1]')->getAttrValue('href'); // https://www.hc360.com
    

3.快捷方法获取xpath query

    1.谷歌浏览器安装扩展：XPath Helper
  
    2.页面中打开控制台选择dom模块
  
    3.选择要提取的数据右键copy->copy xpath
    
 
###如果有帮助到你或学习到新知识 请点 Star
