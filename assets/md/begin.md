Lime 微框架
==================

作者：aheinze,faulancer

手册：bstaint

#### 简介 ####

Lime是一款PHP单文件微框架(仅30KB左右)，用于以最少的代码快速创建web应用。

该框架不包含数据库，表单验证等第三方类库，需另外以[服务][service]的形式扩展。

#### 命名方式 ####

请尽量将类文件首字母大写，在代码中引用也需要注意大小写。

#### 安装和使用 ####

到github下载[最新代码][download]，解压即可使用，文件结构如下：

    Lime-master/
    ├── src/
    │   ├── Lime/
    │       ├── App.php
    ├── index.php

`index.php`代码如下：

    require_once("src/Lime/App.php");

    $app = new Lime\App();

    $app->bind("/", function(){
        return "Hello World!";
    });

    $app->run();

需要更多的自定义配置请继续阅读。

 [download]: https://github.com/aheinze/Lime/archive/master.zip
 [service]: http://lnmp/limewiki/wiki/service