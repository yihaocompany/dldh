# 导航API 后台管理
导航API 后台管理
#### 环境要求 
php5.6 phalcon3.3 redis mysql mongodb
#### REDIS的做缓存


```php
$di->setShared('cache', function () {
    $frontCache = new Phalcon\Cache\Frontend\Data([
            "lifetime" => 172800,
        ]);
    $cache=new Phalcon\Cache\Backend\Redis(
        $frontCache,[
            "host"       => "localhost",
            "port"       => 6379,
            "persistent" => false,
            "index"      => 0,
        ]
    );
    return $cache;
});
```
#### 数据库的跟踪
```php
$di->set('profiler', function(){
    return
        new  \Phalcon\Db\Profiler();
}, true);

$di->setShared('db', function () use ($di){
    //新建一个事件管理器
    $eventsManager = new \Phalcon\Events\Manager();
    //从di中获取共享的profiler实例
    $profiler = $di->getProfiler();
    //监听所有的db事件
    $eventsManager->attach('db', function($event, $connection) use
    ($profiler) {
        //一条语句查询之前事件，profiler开始记录sql语句
        if ($event->getType() == 'beforeQuery') {
            $profiler->startProfile($connection->getSQLStatement());
        }
        //一条语句查询结束，结束本次记录，记录结果会保存在profiler对象中
        if ($event->getType() == 'afterQuery') {
            $profiler->stopProfile();
        }
    });

    $config = $this->getConfig();
    $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    $params = [
        'host'     => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname,
        'charset'  => $config->database->charset
    ];

    if ($config->database->adapter == 'Postgresql') {
        unset($params['charset']);
    }
    $connection = new $class($params);
    $connection->setEventsManager($eventsManager);
    return $connection;
});

```


