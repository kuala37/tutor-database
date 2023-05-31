<?php
    define('DB_HOST','127.0.0.1');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_NAME','myfirstdb');
    $mysql = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if ($mysql->connect_errno) exit('ошбика подключения к бд');
    $mysql->set_charset('utf8');
?>