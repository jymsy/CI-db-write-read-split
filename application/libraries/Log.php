<?php
/**
 * Desc:
 * Author: mayongtao
 */

class Log {
    private $logPath = '';
    public function __construct(){
        $this->logPath = APPPATH.'/logs/sql_log';
    }

    public function write($msg){
        file_put_contents($this->logPath,$msg,FILE_APPEND | LOCK_EX);
    }

}