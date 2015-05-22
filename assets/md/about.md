简介
------------

该手册仅供个人学习参考，程序由`Lime`框架，`cimarkdown`，`bootstrap`，`highlight.js`，`pagedown.js`编写。

程序源码：[http://www.github.com/bstaint/limewiki][source_url]

#### 更新日志 ####

- 更新核心框架.
- 重写app代码，使用框架新特性.
- 精简规范部分代码，修复框架调用私有方法.
- 分离模板文件和markdown文件.
- 添加编辑wiki功能，便于修正信息.
- 更新about页面引入markdown内容便于维护.
- 更新nginx配置信息，加入$query_string.
- 更新$path_info获取，支持apache和nginx.
- 更新主菜单，侧边栏导航菜单输出方式.
- 添加highlight.js高亮代码功能.

#### 文件结构 ####

    limewiki/
    ├── src/
    │   ├── Lime/
    │       ├── App.php
    ├── app/
    │   ├── controllers/
    │       ├── wiki.php
    │   ├── helpers/
    │       ├── Common.php
    │   ├── libs/
    │       ├── cimarkdown.php
    │   ├── autoload.php
    │   ├── router.php
    ├── views/
    ├── index.php

 [source_url]: http://www.github.com/bstaint/limewiki
