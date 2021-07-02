<?php
    include 'includes/header.php';
    include 'includes/dbconnection.php';
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./css/style.css" rel="stylesheet" type="text/css"></link>
        <link href="./css/header.css" rel="stylesheet" type="text/css"></link>
        <script src="./js/script.js" type="text/javascript"></script>
    </head>

    <body>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="images/banner/banner1.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="images/banner/banner2.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="images/banner/banner3.png" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="images/banner/banner4.png" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="images/banner/banner5.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="images/banner/banner6.png" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="images/banner/banner7.jpg" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div style='text-align: center;'>
            <span class="dot" onclick='currentSlide(1)'></span>
            <span class="dot" onclick='currentSlide(2)'></span>
            <span class="dot" onclick='currentSlide(3)'></span>
            <span class="dot" onclick='currentSlide(4)'></span>
            <span class="dot" onclick='currentSlide(5)'></span>
            <span class="dot" onclick='currentSlide(6)'></span>
            <span class="dot" onclick='currentSlide(7)'></span>
        </div>
    </div>

    <table id=home_product>
        <tr>
            <td>Mouse</td>
        </tr>
        <tr>
            <?php 
                $conn = OpenCon();
                $sql = "SELECT * FROM `product` WHERE category_id='CMS'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_connect_errno()){
                    echo 'Unable to retrieve data from database: ' . mysqli_connect_errno();
                }
                while($row = mysqli_fetch_object($result)){
                    printf('
                    <td><a href="product_detail.php?id=%s"><img src=".%s"></a>
                    <h2>%s</h2>
                    <p>RM%s</p>
                    <button>Add to cart</button>
                    </td>
                    

                    ',$row->product_id,$row->image_path,$row->product_name,$row->nett_price);
                }
            ?>
            
        </tr>
     </table>


     <table id=home_product>
        <tr>
            <td>Keyboard</td>
        </tr>
        <tr>
            <?php 
                $conn = OpenCon();
                $sql = "SELECT * FROM `product` WHERE category_id='CKB'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_connect_errno()){
                    echo 'Unable to retrieve data from database: ' . mysqli_connect_errno();
                }
                while($row = mysqli_fetch_object($result)){
                    printf('
                    <td><a href="product_detail.php?id=%s"><img src=".%s"></a>
                    <h2>%s</h2>
                    <p>RM%s</p>
                    </td>

                    ',$row->product_id,$row->image_path,$row->product_name,$row->nett_price);
                }
            ?>
        </tr>
     </table>

     
    </body>
<html>

<script>

    var slideIndex = 1;
    var myTimer;
    var slideshowContainer;

    // Next/previous controls
    function plusSlides(n){
        clearInterval(myTimer);
        if (n < 0){
            showSlides(slideIndex -= 1);
        } else {
            showSlides(slideIndex += 1); 
        }
        if (n === -1){
            myTimer = setInterval(function(){plusSlides(n + 2)}, 4000);
        } else {
            myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
        }
    }


    function showSlides(n){
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }

    function currentSlide(n){
        clearInterval(myTimer);
        myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
        showSlides(slideIndex = n);
    }

    window.addEventListener("load",function() {
        showSlides(slideIndex);
        myTimer = setInterval(function(){plusSlides(1)}, 4000);
    })
</script>

<?php 
    if(isset($_GET['msg'])){
        if($_GET['msg'] == 'registerfail'){
            ?> <script> openRegisterModal(); alert('<?php echo $_SESSION["registerfail"];?>'); </script> <?php
        }
        elseif($_GET['msg'] =='registersuccess'){
            ?> <script> openLoginModal(); alert('<?php echo $_SESSION["registered"];?>'); </script> <?php
        }
    }
    if(isset($_SESSION["loginerr"])){
        ?> <script> openLoginModal(); </script> <?php 
        unset($_SESSION["loginerr"]);
    }
    if(isset($_SESSION["updpwdmsg"])){
        ?> <script> openPasswordModal(); alert('<?php echo $_SESSION["updpwdmsg"];?>'); </script> <?php 
        unset($_SESSION["updpwdmsg"]);
    }
    if(isset($_SESSION["updmsg"])){
        ?> <script> openProfileModal(); alert('<?php echo $_SESSION["updmsg"];?>'); </script> <?php 
        unset($_SESSION["updmsg"]);
    }

?>