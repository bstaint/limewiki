<?php if(!defined('__BASE_DIR__')) exit('403');

# 载入设置
$app['autoload'] = new ArrayObject(array(
    __BASE_DIR__.'/app/libraries/',
    __BASE_DIR__.'/app/helpers/',
));

$app['app.name'] = 'limewiki';
$app['session.name'] = 'LIMESESSION';

$pathinfo = route_url($app['base_url']);
$app['route'] = empty($pathinfo) ? '/' : $pathinfo;

# 自定义参数
$app['config.begin_point'] = microtime();

$app['config.site'] = array(
    'name' => 'Lime 手册',
    'key' => '755dd7d3da603833281e7cb99355d60d',
    'master' => 'bstaint',
    'email' => 'bstaint@gmail.com',
    'downurl' => 'https://github.com/aheinze/Lime/archive/master.zip',
    'sourceurl' => 'http://www.github.com/bstaint/limewiki'
);

$app['config.menus' ] = array(
    'wiki' => array('route' => '/', 'name' => '手册'),
    'download' => array('route' => '/download', 'name' => '下载'),
    'about' => array('route' => '/about', 'name' => '关于'),
);

$app['config.submenus'] = array(
    'begin' => array('type' => 'menu', 'route' => '/wiki/begin', 'name' => '开始'),
    'divider' => array('type' => 'divider'),
    'setting' => array('type' => 'menu', 'route' => '/wiki/setting', 'name' => '设置'),
    'route' => array('type' => 'menu', 'route' => '/wiki/route','name' => '路由'),
    'request' => array('type' => 'menu', 'route' => '/wiki/request','name' => '请求'),
    'divider1' => array('type' => 'divider'),
    'template' => array('type' => 'menu', 'route' => '/wiki/template','name' => '模板'),
    'controller' => array('type' => 'menu', 'route' => '/wiki/controller','name' => '控制器'),
    'service' => array('type' => 'menu', 'route' => '/wiki/service','name' => '服务'),
    'method' => array('type' => 'menu', 'route' => '/wiki/method','name' => '方法'),
    'divider2' => array('type' => 'divider'),
    'helper' => array('type' => 'menu', 'route' => '/wiki/helper','name' => '插件'),
);

$app->path('views', __BASE_DIR__.'/views');
$app->path('assets', __BASE_DIR__.'/assets');

# 初始化session
$app('session')->init();

# 注册pages helper
$app->helpers['pages'] = 'Pages';

# 注册markdown库
$app->service('markdown', function(){
    $obj = new Cimarkdown();
    return $obj;
});

?>
