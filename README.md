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

```php
       date_default_timezone_set ("Asia/Chongqing");
       $date=$this->request->get('data');
       $y=date("Y");
       $m=date("m");
       $d=date("d");
       $datestring=$y."-".$m."-".$d;
       $date=$date!=""?$date:$datestring;

       $builder = new QueryBuilder();
       $builder -> from(['begin_workersign'=> '\Dldh\Models\WorkerSignBack']);
       $builder -> innerJoin('Dldh\Models\WorkerSignBack', 'begin_workersign.worker_id = end_workersign.worker_id','end_workersign');
       $builder -> innerJoin('Dldh\Models\Worker', 'worker.id = end_workersign.worker_id','worker');
       $builder -> where('begin_workersign.id<>end_workersign.id  and begin_workersign.type=1 and   end_workersign.type=0  and  begin_workersign.dateflag =end_workersign.dateflag and begin_workersign.dateflag=:dateflag: ',array('dateflag' =>$datestring));

       $builder -> columns([
                 'begin_workersign.worker_id',
                'begin_workersign.dateflag as begin_date',
                'end_workersign.dateflag as end_date',
                'worker.realname as realname',
                'end_workersign.type as end_type',
                'begin_workersign.type  as begin_type',
                'begin_workersign.creat_at  as begin_create',
                'end_workersign.creat_at as end_create'
             ]);

        $query = $builder->getQuery();
       $list = $query->execute();
       $this->view->setVars(array('list'=>$list,'date'=>$date));
```


