<?php
    define("username","root");
    define("pass","");
    define("hoat","localhost");
    define("db","sec2");
    $mysql = new mysqli(hoat,username,pass,db);
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to Mysql: " . $mysqli -> connect_errno;
        exit();
    }else{
        echo "DB connected";
    }
?>
