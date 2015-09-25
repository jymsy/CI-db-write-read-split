# CI2.1.4
codeigniter  separated  database read/write   

数据库读写分离

1.实现思路： db配置文件指定master-slave关系，根据执行sql语句判断读写操作，读则连接从库，写则连接主库
写包括 insert,update,truncate等操作。



2.修改文件记录：
application
    config/database.php #修改配置文件
    core/database/DB.php #增加文件
    core/database/DB_driver.php #增加文件
    core/MY_Loader.php #增加文件
    
    完
    
