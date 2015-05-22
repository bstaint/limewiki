路由
------------

Lime的路由功能需要Web服务器支持伪静态，apache的.htaccess：

    <IfModule mod_rewrite.c>
      RewriteEngine On
      RewriteCond %{REQUEST_FILENAME} !-f
      RewriteRule ^(.*)$ index.php/$1 [QSA,L]
    </IfModule>

nginx配置文件：

    location / {
        # Check if a file exists, or route it to index.php.
        try_files $uri $uri/ /limewiki/index.php?$query_string;
    }

在Lime中，一个路由匹配一个HTTP请求URL，每一个路由都与一个函数关联：

    $app->get("/", function() {
        return "This was a GET request...";
    });
    
    $app->post("/", function() {
        return "This was a POST request...";
    });
    
    $app->bind("/", function() {
        return "This was a GET or POST request...";
    });

路由的匹配是按照它们的定义顺序执行，请求将调用第一个匹配到的路由方法。

路由的方式可以包括命名参数，也可以包括正则：

    $app->get("/posts/:id/:name", function($params) {
        return $params["id"].'-'.$params["name"];
    });
    
    $app->post("/misc/*", function($params) {
        return $params[":splat"];
    });
    
    $app->bind("#/pages/(about|contact)#", function($params) {
        return implode("\n", $params[":captures"]);
    });

重定向到其他路由：

    $app->reroute('/pages');
