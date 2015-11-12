# CI2.1.4
codeigniter  separated  database read/write   

数据库读写分离

1.实现思路： db配置文件指定master-slave关系，根据执行sql语句判断读写操作，读则连接从库，写则连接主库
写包括 insert,update,truncate等操作。



2.修改文件记录：
application


    添加
        config/development/database.php
        config/production/database.php #并修改配置

        core/database/DB.php

        core/database/DB_driver.php

        core/MY_Loader.php  #重新 database  function

        helper/db_proxy_helper.php
    修改：
        config/autoload.php
            修改  $autoload['helper'] = array('db_proxy');
    
    
    完
    
