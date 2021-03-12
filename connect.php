<?php
    define("username","root");
    define("pass","");
    define("hoat","localhost");
    define("db","sec2");
    $mysql = new mysqli(hoat,username,pass,db);
    if ($mysql -> connect_errno) {
        echo "Failed to connect to Mysql: " . $mysql -> connect_errno;
        exit();
    }else{
        echo "DB connected";
    }
?>
