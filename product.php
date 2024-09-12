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
if(isset($_REQUEST["cat"])){
    getCatProduct();
    
}
else{
    getAllProduct();
}

function getCatProduct(){
    $conn = OpenCon();
    $i = 0;
    $sql = "SELECT * FROM product WHERE category_id='" . $_REQUEST["cat"] . "'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_connect_errno()){
        echo 'Unable to retrieve data from database: ' . mysqli_connect_errno();
    }
    else{
        displayProduct($result);
    }
    
    
    CloseCon($conn);
}

function getAllProduct(){
    $conn = OpenCon();
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
    if(mysqli_connect_errno()){
        echo 'Unable to retrieve data from database: ' . mysqli_connect_errno();
    }
    else{
        displayProduct($result);
    }
    CloseCon($conn);
}


function displayProduct($result){
    printf('<table class="product_table" cellspacing=0><tr>');
    while($row = mysqli_fetch_object($result)){
        printf('
            
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
            
        ',$row->product_id,$row->image_path,$row->product_name,$row->nett_price,$row->product_id);

        $i = countColumn($i);
    }
    printf('</tr></table>');

}

function countColumn($i){
    $i++;
    if($i == 3){
        printf("</tr><tr>");
        $i = 0;
    }
    return $i;
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
</tr>
</table>

</body>
</html>