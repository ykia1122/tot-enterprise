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
    <table>
<?php

include 'includes/dbconnection.php';

if(isset($_REQUEST["cat"])){
    getCatProduct();
    
}
else{
    getAllProduct();
}

function getCatProduct(){
    $conn = OpenCon();
    $sql = "SELECT * FROM product WHERE category_name='" . $_REQUEST["cat"] . ".";
    $result = mysqli_query($conn, $sql);
    if(mysqli_connect_errno()){
        echo 'Unable to retrieve data from database: ' . mysqli_connect_errno();
    }
    while($row = mysqli_fetch_object($result)){
        printf('
            <tr>
            <td><a href="product_detail.php?id=%s"><img src=".%s"></a>
            <h2>%s</h2>
            <p>RM%s</p>
            <form action="includes/addtocart.php" method="get">
            <button >Add to cart</button>
            <input type="hidden" name="product_id" value="%s">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="num" value="1">
            </form>
            </td>
            </tr>
        ',$row->product_id,$row->image_path,$row->product_name,$row->nett_price,$row->product_id);
    }
    CloseCon($conn);
}

function getAllProduct(){
    $conn = OpenCon();
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_object($result)){
        printf('
            <tr>
            <td><a href="product_detail.php?id=%s"><img src=".%s"></a>
            <h2>%s</h2>
            <p>RM%s</p>
            <form action="includes/addtocart.php" method="get">
            <button >Add to cart</button>
            <input type="hidden" name="product_id" value="%s">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="num" value="1">
            </form>
            </td>
            </tr>
        ',$row->product_id,$row->image_path,$row->product_name,$row->nett_price,$row->product_id);
    }
    CloseCon($conn);
}


?>
</table>
</body>
</html>