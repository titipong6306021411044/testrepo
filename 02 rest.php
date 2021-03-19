<?php
    include_once "01 dbcontrol.php";
    include_once "util.php";

    $debug_mode = false;
    
    $mydb = new db("root", "","sec2", false);
    if($_SERVER['REQUEST_METHOD']=='GET'){
        debug_text("for GET Method", $debug_mode);
        (show_data($debug_mode));
    }else if ($_SERVER['REQUEST_METHOD'] =='POST'){
        debug_text("POST may be support next time<br>", $debug_mode);
        echo"Post Tricker";
        if(isset($_POST['u_id'])&& isset($_POST['u_name'])){
            $u_id = $_POST['u_id'];
            $u_name = $_POST['u_name'];
            insert_newdata($u_id,$u_name,$debug_mode);
        }
        //$message = '{"Status":'+print_r($_POST)+'}';
        //echo json_encode($message);
        // debug_text("for POST Method", $debug_mode);
    }else{
        debug_text("Error Unkown this Request", $debug_mode);
        http_response_code(405);
    }
    function show_data($debug_mode){
        $mydb = new db("root","","sec2",$debug_mode);
         echo json_encode($mydb->query("SELECT * FROM `customer`"));
        // $data = $mydb->query("SELECT * FROM `customer`");
        $mydb->close();
        // return $data;
    }
    function insert_newdata($u_id,$u_name,$debug_mode){
        $mydb = new db("root","","sec2",$debug_mode);
        $sql = ("INSERT INTO `customer`(`CustomerID`, `customerName`) VALUES ({$u_id},'{$u_name}')");
        // echo json_encode($mydb->query("insert select * from customer"));
        $data = $mydb->query($sql);
        $mydb->query_only($sql);
        $mydb->close();
        show_data($debug_mode);
        return $data;
    }
?>