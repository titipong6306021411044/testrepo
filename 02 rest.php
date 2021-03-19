<?php
    include_once "01 dbcontrol.php";
    include_once "util.php";

    $debug_mode = false;
    
    $mydb = new db("root", "","sec2", false);
    if($_SERVER['REQUEST_METHOD']=='GET'){
        debug_text("for GET Method", $debug_mode);
        (show_data());
    }else if ($_SERVER['REQUEST_METHOD'] =='POST'){
        debug_text("for POST Method", $debug_mode);
    }else{
        debug_text("Error Unkown this Request", $debug_mode);
        http_response_code(405);
    }
    function show_data(){
        $mydb = new db("root","","sec2",false);
        echo json_encode($mydb->query("select * from customer"));
        $mydb->close();
    }
?>