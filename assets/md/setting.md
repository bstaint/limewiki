设置
------------

默认的设置参数如下：

    $this->registry = array_merge(array(
        'debug'        => true,   //debug模式
        'app.name'     => '',     //应用名称
        'session.name' => null,   //session名
        'autoload'     => new \ArrayObject(array()),  //自动加载类路径
        'sec-key'      => 'xxxxx-SiteSecKeyPleaseChangeMe-xxxxx',    //安全key
        'route'        => isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : "/", //当前路由，默认为PATH_INFO
        'charset'      => 'UTF-8',   //默认编码
        'helpers'      => array(),   //插件列表
        'base_url'     => implode("/", array_slice(explode("/", $_SERVER['SCRIPT_NAME']), 0, -1)), //应用url
        'base_route'   => implode("/", array_slice(explode("/", $_SERVER['SCRIPT_NAME']), 0, -1)),  //默认路由
        'docs_root'    => isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT']:'' //说明文档
    ), $settings);

自定义变量设置：

    $app->set('key','value');

调用自定义变量：

    echo $app['key'];
