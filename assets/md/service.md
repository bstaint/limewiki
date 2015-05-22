服务
------------

注册服务是Lime的最核心的功能，它可以将一些成熟的类库加入到框架中，并且很简单的使用它们。

    $app->service("db", function(){
    
        $obj = new PDO(...);
        return $obj;
    
    });
    
    $app["db"]->query(...);
