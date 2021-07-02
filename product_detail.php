
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
    <div id="product_container">
<?php
    include 'includes/header.php';
    include 'includes/dbconnection.php';
    
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
            <button onclick="minusItem()" class="minus_item">-</button>
            <input type=text class="quantity" value=1></input>
            <button class="plus_item">+</button>
            <input type=submit value="Add to cart" class="addtocart"></button>
            </div
            ',$row->image_path,$row->product_name,$row->product_desc,$row->nett_price,$row->product_quantity);
        }
}
    function minusItem(){
        
    }
    if(isset($_GET['addtocart'])){
        $_SESSION["cart"] = $_GET['productname'];
        echo $_SESSION["cart"];
    }

?>

    </div>

    </body>
</html>


