<?php if(!defined('__BASE_DIR__')) exit('403');

# 首页
$app->get('/', function(){
    $this->reroute('/wiki/begin');
});

# 页面
$app->get('/:page', function($params){
    if(array_key_exists($params['page'], $this['config.menus'])){
        return $this('pages')->page($params['page']);
    }
});

# wiki页面
$app->get('/wiki/:name', function($params){
    if(array_key_exists($params['name'], $this['config.submenus'])){
        return $this('pages')->wiki($params['name']);
    }
});

# wiki 编辑页面
$app->get('/wiki/:name/edit', function($params){
    if(array_key_exists($params['name'], $this['config.submenus'])){
        return $this('pages')->edit($params['name']);
    }
});

# 编辑提交页面
$app->post('/action/edit', function(){
    $data = input_post();
    $uri = '/wiki/begin'; $msg = '请求错误!';
    $filename = __BASE_DIR__ . "/assets/md/{$data['filename']}.md";

    if(file_exists($filename) && !empty($data['content'])){
        if($this->hash($data['passwd']) == $this['config.site/key']){
            $uri = '/wiki/' . $data['filename'];
            $msg = '修改成功！'; 
            file_put_contents($filename, $data['content']);
        }else{
            $msg = '站点密码错误!';
        }
    }

    $this('session')->write('msg', $msg);
    $this->reroute($uri);
});

# 404
$app->on("after", function(){
    switch($this->response->status){
        case "404":
            $data = array(
                'title' => '404',
                'cur_page' => '404'
            );
            $this->response->body = $this->render('views:404.php with views:layout.php', $data);
            break;
    }
});
?>
