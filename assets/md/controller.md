控制器
------------

如果你想使用oo的风格，你只需要绑定一个类，请注意`大小写`：

    class Pages {
    
            protected $app;
    
            public function __construct($app){
                    $this->app = $app;
            }
    
            /* 
                    accessible via 
                    /pages or /pages/index
            */
            public function index() {
                    return $this->app->render("pages/index.php");
            }
    
            /* 
                    accessible via 
                    /pages/contact
            */
            public function contact() {
                    return $this->app->render("pages/contact.php");
            }
    
            /* 
                    accessible via 
                    /pages/welcome/foo
            */
            public function welcome($name) {
                    return $this->app->render("pages/welcome.php", array("name"=>$name));
            }
    }
    
    
    $app->bindClass("Pages");
