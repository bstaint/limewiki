请求
------------

路由可以通过条件来匹配请求，例如限制`user-agent`：

    $app->get("/foo", function() {
        // GET request...
    }, strpos($_SERVER['HTTP_USER_AGENT'], "Safari")!==false);

你可以使用三个程序事件来提前处理请求：`before`,`after`,`shutdown`：

    $app->on("after", function(){
        switch($this->response->status){
            case "404":
                $app->response->body = $this->render("views/404.php");
                break;
            case "500":
                $this->response->body = $this->render("views/500.php");
                break;
        }
    });

当然也可以使用自定义事件：

    // register callback
    $app->on("customevent", function(){
        // code to execute on event
    }, $priority = 0);

    // trigger custom events
    $app->trigger("customevent", $params=array());