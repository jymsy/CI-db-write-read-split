<?php
/**
 * Desc:回收数据库连接
 * Author: mayongtao
 */
class Recycle
{

    public function __construct()
    {
        echo __DIR__;
        echo 'sssssss';
    }

    public function closeDb()
    {

        register_shutdown_function(function () {
            $ci = &get_instance();
            $vars = get_object_vars($ci);

            foreach (get_object_vars($ci) as $key => $val) {

                if (substr($key, 0, 2) == 'db' && is_object($ci->{$key}) && method_exists($ci->{$key}, 'close')) {
                    $ci->{$key}->close($key);
                }
                if (substr($key, 0, 5) == 'conn_' && is_resource($ci->{$key})) {
                    $ci->db->_close($val);
                    unset($ci->{$key});
                }

            }
        });
    }


}