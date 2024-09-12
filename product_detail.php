<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./css/style.css" rel="stylesheet" type="text/css"></link>
        <link href="./css/header.css" rel="stylesheet" type="text/css"></link>
        <script src="./js/script.js" type="text/javascript"></script>
    </head>

    <body>
    
<?php
    include 'includes/header.php';
    include 'includes/dbconnection.php';
    
    session_start();
        


?><div class="product_container"><?php
    if(isset($_GET['id'])){
        $conn = OpenCon();
        $pid = $_GET['id'];
        $sql = "SELECT * FROM `product` WHERE product_id='$pid'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_connect_errno()){
            echo 'Unable to retrieve data from database: ' . mysqli_connect_errno();
        }
        while($row = mysqli_fetch_object($result)){
            printf('
            <div class="img"><img src=".%s"></div>
            <div class="product_detail">
            <h1 class="product_name">%s</h1>
            <p class="product_desc">%s</p>
            <p class="nett_price">%s</p>
            <p class="total_quantity">%s quantity left</p>
            
            <form class="form-addcart" action="includes/addtocart.php" method="GET">
            <button type="button" onclick="minusItem()" class="minus_item">-</button>
            <input id="quantity" class="txtquantity" type="number" name="num" value="1"></input>
            <button type="button" onclick="plusItem()" class="plus_item">+</button>
            <input type="hidden" name="action" value="add"></input>
            <input type="hidden" id="max-quan" value=%s></input>
            <input type="hidden" name="product_id" value="%s"></input>
            <input type="submit" value="Add to cart" class="addtocart"></button>
            </form>
            </div>
            ',$row->image_path,$row->product_name,$row->product_desc,$row->nett_price,$row->product_quantity,$row->product_quantity,$row->product_id);
        }
}

if(isset($_SESSION["cartmsg"])){
    if($_SESSION["cartmsg"] == "-1"){
        ?> <script>  alert("Please Log In first"); openLoginModal();  </script> <?php
    }
    else if($_SESSION["cartmsg"] == "1"){
    ?> <script> alert("Item added to cart");  </script> <?php
    }
    unset($_SESSION["cartmsg"]);
}
?>

    </div>


    </body>


    
</html>


