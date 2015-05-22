模板
------------

一般情况下你可以通过服务来扩展程序使用任何模板引擎，Lime也自带了一个简单的模板引擎。

    $app->get("/", function(){
    
            $data = array(
                "name"  => 'Frank', 
                "title" => 'Template demo'
            );
    
            return $this->render("views/view.php with views/layout.php", $data);
    });

`views/view.php`:

    <p>
        Hello <?php echo $name;?>.
    </p>

`views/layout.php`:

    <!DOCTYPE HTML>
    <html lang="en-US">
    <head>
            <meta charset="UTF-8">
            <title><?php echo $title;?></title>
    </head>
    <body>
            <?php echo $content_for_layout;?>
    </body>
    </html>

注意：在模板文件中可以直接使用$app变量。
