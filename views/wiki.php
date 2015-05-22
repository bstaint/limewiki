<?php if(!defined('__BASE_DIR__')) exit('403');?>
<div class="row-fluid">
    <span class="span3">
        <div class="well">
            <ul class="nav nav-list">
                <?php foreach($app['config.submenus'] as $key => $value){
                    switch ($value['type']) {
                        case 'menu':
                            $class = $cur_page_wiki == $key ? ' class="active"' : '';
                            echo "<li {$class}><a href=\"{$app->baseUrl($value['route'])}\">{$value['name']}</a></li>";
                            break;
                        case 'divider':
                            echo '<li class="divider"></li>';
                            break;
                    }
                }?>
            </ul>
        </div>
    </span>
    <span class="span9">
        <?php if(isset($msg)): ?>
        <div class="alert alert-info"><?php echo $msg;?></div>
        <?php endif ?>
        <p class="editmd"><a href="<?php echo $app->baseUrl("/wiki/{$cur_page_wiki}/edit");?>">编辑</a></p>
        <?php echo $content;?>
    </span>
</div>
