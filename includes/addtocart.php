<?php
session_start();
include "dbconnection.php";

if(!isset($_SESSION["cookie_name"]) || !isset($_COOKIE[$_SESSION["cookie_name"]])){
    $_SESSION["cartmsg"] = "-1";
    ?><script> history.go(-1);</script><?php

}
else{
    checkAction();
}

function checkAction(){
    if(isset($_GET["action"])){
        switch($_GET["action"]){
        case "add":
            if(isset($_GET["num"])) {
                $conn = OpenCon();
                $result = mysqli_query($conn,"SELECT * FROM product WHERE product_id='" . $_GET["product_id"] . "'");
                while($row = $result->fetch_assoc()){
                    $pid = $row["product_id"];
                    $itemArray = array($row["product_id"]=>array('product_id' => $row["product_id"], 'product_name'=>$row["product_name"], 'product_desc'=>$row["product_desc"], "img_path"=>$row["image_path"], 'Quantity'=>$_GET["num"], 'price'=>$row["nett_price"]));
                }
                
                if(isset($_SESSION["cart_item"]) && !empty($_SESSION["cart_item"])) {
                    if(in_array($pid,array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($pid == $k) {
                                if(empty($_SESSION["cart_item"][$k]["Quantity"])) {
                                    $_SESSION["cart_item"][$k]["Quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["Quantity"] += $_GET["num"];
                                
                            }
    
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
                $_SESSION["cartmsg"] = "1";
                ?><script>history.go(-1);</script><?php
            }
            break;
    
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["product_id"] == $k)
                        unset($_SESSION["cart_item"][$k]);				
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
                $_SESSION["cartmsg"] = "2";
                ?><script>history.go(-1);</script><?php
            }
            break;
        
        case "empty":
            unset($_SESSION["cart_item"]);
            $_SESSION["cartmsg"] = "3";
            ?><script>history.go(-1);</script><?php
            break;	
        }
    }

}


?>