<?php if(!defined('__BASE_DIR__')) exit('403');?>
<div class="row-fluid">
    <span class="span3">
        <div class="well">
            <img src="<?php echo $app->baseUrl('/assets/images/logo.jpg');?>" class="pull-center image">
            <p>作者: <?php echo $app['config.site/master'];?></p>
            <p>邮箱: <?php echo str_replace('@','#', $app['config.site/email']);?></p>
        </div>
    </span>
    <span class="span9">
    <?php echo $content;?>
    </span>
</div>
