<?php if(!defined('__BASE_DIR__')) exit('403');?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $title.' - '.$app['config.site/name'];?></title>
    <?php echo $app->style(array(
        'assets:css/bootstrap.min.css',
        'assets:css/common.css',
        'assets:css/github.css')
    );?>
</head>
<body>
<div class="navbar navbar-static-top navbar-inverse">
    <div class="navbar-inner">
    <a class="brand" href="<?php echo $app->baseUrl('/');?>"><?php echo $app['config.site/name'];?></a>
        <ul class="nav">
            <?php foreach($app['config.menus'] as $key => $value):
                $class = $cur_page == $key ? ' class="active"' : '';
                echo "<li {$class}><a href=\"{$app->baseUrl($value['route'])}\">{$value['name']}</a></li>";
            endforeach;?>
        </ul>
    </div>
</div>
<div class="container">
    <?php echo $content_for_layout;?>
</div>
<div class="container-fluid">
<p>© Copyright 2014  <strong><?php echo $app->elapsed_time;?></strong> msecs, <strong><?php echo $app->memory_usage;?></strong> memorys</p>
<?php echo $app->script('assets:js/highlight.pack.js');?>
<script>hljs.initHighlightingOnLoad();</script>
</div>
</body>
</html>
