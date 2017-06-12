<?php

echo "YOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOo"

if (!function_exists('connector')) {
    function connector()
    {
        if ($_SERVER['HTTP_HOST'] == "haithem-benromdhane.com") {
            return new PDO("mysql:host=haithemboq123456.mysql.db;dbname=haithemboq123456;", "haithemboq123456", "Shaco1994",
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
                ));
        }
    }
}
?>