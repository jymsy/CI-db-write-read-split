# CI2.1.4
codeigniter  separated  database read/write   

数据库读写分离

1.实现思路： db配置文件指定master-slave关系，默认连接从库，根据执行sql语句判断读写操作，写则连接主库
写包括 insert,update,truncate等操作。



2.修改文件记录：



    添加
        application/config/development/database.php
        application/config/production/database.php #并修改配置

        application/core/database/DB.php

        application/core/database/DB_driver.php

        application/core/MY_Loader.php  #重新 database  function

    修改：

    index.php  修改 define('ENVIRONMENT', 'development'); production

    完
    
