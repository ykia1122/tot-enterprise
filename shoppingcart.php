<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./css/style.css" rel="stylesheet" type="text/css"></link>
        <link href="./css/header.css" rel="stylesheet" type="text/css"></link>
        <script src="./js/script.js" type="text/javascript"></script>

        <?php include 'includes/header.php';?>
    </head>

    <body>
        <table class="cart-table" style="">
    <?php
    session_start();
    if(isset($_SESSION["cart_item"])){
        foreach($_SESSION["cart_item"] as $item){
            ?>
            <tr>
                <td>
                <input type='checkbox'></input>
                </td>
                <td>
                <img width="40%" src='.<?php echo $item["img_path"]; ?>'>
                </td>
                <td>
                <h3 id="name"><?php echo $item["product_name"]; ?></h3>
                <p>Quantity: <?php echo $item["Quantity"]; ?></p>
                <button onclick="openUpdateModal()">Update</button>
                <button>Remove</button>
                </td>
                <?php
        }
        ?></table><?php
    }
    else{
        ?>
        <div class="noitem">
        <label class="noitemlabel">No item in your shopping cart</label><br/>
        <button>Go to Product</button>
        </div>
        <?php
    }




?>
    <body>
</html>