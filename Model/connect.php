<?php

function connector()
{
    return new PDO("mysql:host=localhost;dbname=m2l;charset=UTF8", "root", "",
        array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
        ));
}

?>