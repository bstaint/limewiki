插件
------------

你可以使用自定义插件来扩展Lime：

    class MyHelperClass extend Lime\Helper {
    
        public function test(){
            echo "Hello!"
        }
    }
    
    $app->helpers["myhelper"] = 'MyHelperClass';

使用：
    
    $app("myhelper")->test();

### 框架自带插件使用

**session**：

    $app("session")->init($sessionname=null);
    $app("session")->write($key, $value);
    $app("session")->read($key, $default=null);
    $app("session")->delete($key);
    $app("session")->destroy();

**cache**：

    $app("cache")->setCachePath($path);
    $app("cache")->write($key, $value, $duration = -1);
    $app("cache")->read($key, $default=null);
    $app("cache")->delete($key);
    $app("cache")->clear();