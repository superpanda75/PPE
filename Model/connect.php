<?php
if (!function_exists('connector')) {
    function connector()
    {
        //CONFIGURATION SERVEUR M2L
        if ($_SERVER['HTTP_HOST'] == "172.16.0.2") {
            return new PDO("mysql:host=mysql.m2l.local;dbname=hbenromdhane;", "hbenromdhane", "azerty",
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
                ));
        } //CONFIGURATION WAMP LOCAL
        elseif ($_SERVER['HTTP_HOST'] == "127.0.0.1" || "localhost") {
            return new PDO("mysql:host=localhost;dbname=m2l;charset=UTF8", "root", "",
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
                ));
        } //CONFIGURATION OVH
        elseif ($_SERVER['HTTP_HOST'] == "haithem-benromdhane.com") {
            return new PDO("mysql:host=haithemboq123456.mysql.db;dbname=haithemboq123456;", "haithemboq123456", "Shaco1994",
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
                ));
        }
    }
}
?>