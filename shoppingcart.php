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
        <div>
        <table class="cart-table" cellspacing=0>
            <tr>
                <td style="width:10%" class="title"><button>Select All</button></td>
                <td class="title"><a href="includes/addtocart.php?action=empty">Empty Cart</a></td>
            </tr>
    <?php
    session_start();
    if(isset($_SESSION["cart_item"])){
        $i = 0;
        foreach($_SESSION["cart_item"] as $item){
            ?>
            <tr>
                <td style="text-align:center;border:none;">
                <input type='checkbox' id="chk" onclick="addorder(this)" value="<?php echo $i; ?>"></input>
                </td>
                <td>
                <img width="40%" src='.<?php echo $item["img_path"]; ?>'>
                </td>
                <td>
                <h3 id="name"><?php echo $item["product_name"]; ?></h3>
                <p>Quantity: <?php echo $item["Quantity"]; ?></p>
                <p>Unit Price: RM<?php echo $item["price"]; ?></p>
                <button onclick="openCartModal()">Update</button>
                <button>Remove</button>
                <input type="hidden" id="quantity<?php echo $i;?>" value="<?php echo $item["Quantity"]; ?>"></input>
                <input type="hidden" id="price<?php echo $i;?>" value="<?php echo $item["price"]; ?>"></input>
                </td>
                <?php $i++;
        }
        ?></table>
         <fieldset class="order_summary">
        <legend>Order Summary</legend>
        <p>Total amount: RM <span id="totalamount"></span></p>
        </fieldset>
        </div>
        <?php
    }
    else{
        ?>
        <div class="noitem">
        <label class="noitemlabel">No item in your shopping cart</label><br/>
        <a href="product.php">Go to Product</a>
        </div>
        <?php
    }

?>


<div id="cart-modal" class="modal">  
        <!-- Modal Content -->
        <form class="modal-content animate" action="includes/auth.php? method="POST">
          <span onclick="closeCartModal()" class="close" title="Close Modal">&times;</span>
          
      
          <div class="container" style="background-color:#f1f1f1;position:absolute; bottom:0px;margin:0;width: 100%;height: 90px;">
            <button type="button" onclick="closeCartModal();" class="cancelbtn">Cancel</button>
            <span class="psw"> <a href="#">Forgot password?</a></span>
          </div>
        </form>
      </div> 

</body>
    


    <script>
        function addorder(that) {
            var value = that.value;
            var quantity = document.getElementById('quantity'+value).value
            var price = document.getElementById('price'+value).value
            var amount = Number(quantity * price).toFixed(2);
            var total = Number(document.getElementById("totalamount").innerHTML);
            if(that.checked == true){
                total = Number(total) + Number(amount);
            }
            else if(that.checked == false){
                total = Number(total) - Number(amount);
            }
           
           document.getElementById("totalamount").innerHTML = Number(total).toFixed(2);
}
    </script>
</html>