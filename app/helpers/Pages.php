<?php
class Pages extends Lime\Helper{


    private function md_exist($name)
    {
        $content = '';
        $filename = __BASE_DIR__ . "/assets/md/{$name}.md";
        if(file_exists($filename)){
            $content = file_get_contents($filename);
        }
        return $content;
    }

    # 普通页面
    public function page($page){
        $data = array(
            'title' => $this->app['config.menus'][$page]['name'],
            'cur_page' => $page,
            'content' => $this->app->markdown->markit($this->md_exist($page))
        );
        
        return $this->app->render("views:{$page}.php with views:layout.php", $data);

    }

    # wiki 页面
    public function wiki($name){
        $data = array(
            'title' => $this->app['config.submenus'][$name]['name'],
            'cur_page' => 'wiki',
            'cur_page_wiki' => $name,
            'content' => $this->app->markdown->markit($this->md_exist($name))
        );

        $data['msg'] = $this->app->helper('session')->read('msg');
        $this->app->helper('session')->delete('msg');
    
        return $this->app->render('views:wiki.php with views:layout.php', $data);
    }

    # wiki 编辑页面
    public function edit($name){
        $data = array(
            'title' => "编辑 {$name}.md",
            'cur_page' => $name,
            'filename' => $name,
            'content' => $this->md_exist($name)
        );

        return $this->app->render('views:edit.php with views:layout.php', $data);
    }
}

?>
