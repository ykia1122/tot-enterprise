<?php
    session_start();
    include 'dbconnection.php';
    
    if($_GET['action'] == "updpfl"){
        if((isset($_GET['chgemail']) && isset($_GET['chguname'])) && ($_GET['chgemail'] != $_SESSION["userinfo"][2] || $_GET['chguname'] != $_SESSION["userinfo"][1] ) ){
            updateProfile();
        }
        else if(isset($_GET['chgemail']) && !isset($_GET['chguname']) && $_GET['chgemail'] != $_SESSION["userinfo"][2]){
            updateEmail();
        }
        else if(!isset($_GET['chgemail']) && isset($_GET['chguname']) && $_GET['chguname'] != $_SESSION["userinfo"][1]){
            updateUsername();
        }
        else{
           NoChange();
        }
    }

    if($_GET['action'] == "chgpwd"){
        if($_GET['oldpwd'] = $_GET['newpwd'] = $_GET['confpwd']){
            PassNoChange();
        }
        else{
            updatePassword();
        }
    }
    
    
    function updateProfile(){
        if(validateEmail() && validateUsrname()){
            $uid = $_SESSION["userinfo"][0];
            $uname = $_GET['chguname'];
            $email = $_GET['chgemail'];

            $conn = OpenCon();
            $sql = "UPDATE users SET username='$uname', email_address='$email' WHERE user_id='$uid'";
            if(mysqli_query($conn, $sql)){
                $_SESSION["userinfo"][1] = $uname;
                $_SESSION["userinfo"][2] = $email;
                $_SESSION["updmsg"] = "Records updated successfully";
                header("Location: ../home.php"); 
            } else {
                $_SESSION["updmsg"] = "Error updating record: " . mysqli_error($conn);
                header("Location: ../home.php"); 
            }
            CloseCon($conn);
        }
        else{
            displayInvalidMsg();
        }
    }

    function updateEmail(){
        if(validateEmail()){
            $uid = $_SESSION["userinfo"][0];
            $email = $_GET['chgemail'];
            $conn = OpenCon();
            $sql = "UPDATE users SET email_address='$email' WHERE user_id='$uid'";
            if(mysqli_query($conn, $sql)){
                $_SESSION["userinfo"][2] = $email;
                $_SESSION["updmsg"] = "Email updated successfully";
                header("Location: ../home.php"); 
            } else {
                $_SESSION["updmsg"] = "Error updating record: " . mysqli_error($conn);
                header("Location: ../home.php"); 
            }
            CloseCon($conn);
        }
        else{
            displayInvalidMsg();
        }
    }

    function updateUsername(){
        if(validateUsrname()){
            $uid = $_SESSION["userinfo"][0];
            $uname = $_GET['chguname'];
            $conn = OpenCon();
            $sql = "UPDATE users SET username='$uname' WHERE user_id='$uid'";
            if(mysqli_query($conn, $sql)){
                $_SESSION["userinfo"][1] = $uname;
                $_SESSION["updmsg"] = "Username updated successfully";
                header("Location: ../home.php"); 
            } else {
                $_SESSION["updmsg"] = "Error updating record: " . mysqli_error($conn);
                header("Location: ../home.php"); 
            }
            CloseCon($conn);
        }
        else{
            displayInvalidMsg();
        }
    }

    function validateEmail(){
        if(filter_var($_GET['chgemail'], FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    function validateUsrname(){
        if(strlen($_GET['chguname']) >= 6 ){
            return true;
        }
        return false;
    }

    function updatePassword(){
        if(!validatePassword()){
            $_SESSION["updpwdmsg"] = "Password must have at least 8 character";
            header("Location: ../home.php"); 
        }

        if(confirmNewPass()){
            $uid = $_SESSION["userinfo"][0];
            $option['salt'] = $_SESSION["userinfo"][3];
            $hash = password_hash($_GET['oldpwd'], PASSWORD_BCRYPT, $option);

            $conn = OpenCon();
            $sql = "SELECT * FROM users WHERE user_id='$uid' AND password='$hash'";
            $result = mysqli_query($conn, $sql);

            if($result->num_rows > 0){
                //password match. update password.
                $newpwd = $_GET['newpwd'];
                $newhash = password_hash($newpwd, PASSWORD_BCRYPT, $option);
                $update_sql = "UPDATE users SET password='$newhash' WHERE user_id='$uid'";
                if(mysqli_query($conn, $update_sql)){
                    $_SESSION["updpwdmsg"] = "Record updated successfully";
                    header("Location: ../home.php"); 
                } else {
                    $_SESSION["updpwdmsg"] = "Error updating record: " . mysqli_error($conn);
                    header("Location: ../home.php"); 
                }
            }
            else{
                $_SESSION["updpwdmsg"] = " Old password not match";
                header("Location: ../home.php"); 
            }
            CloseCon($conn);
        }else{
            $_SESSION["updpwdmsg"] = "New password not match";
            header("Location: ../home.php"); 
        }
    }

    function validatePassword(){
        if(strlen($_GET['oldpwd']) >= 8 || strlen($_GET['newpwd']) >= 8 || strlen($_GET['confpwd']) >= 8){
            return true;
        }
        return false;
    }

    function confirmNewPass(){
        if($_GET['newpwd'] == $_GET['confpwd']){
            return true;
        }
            return false;
    }

    function displayInvalidMsg(){
        $_SESSION["updmsg"] = "Fail to update.\\nInvalid Email Format / Username less than 6 char";
        header("Location: ../home.php");
    }

    function NoChange(){
        $_SESSION["updmsg"] = "Email or Username No Changes. No update require";
        header("Location: ../home.php");
    }

    function PassNoChange(){
        $_SESSION["updpwdmsg"] = "Old password and New password are same. No update require";
        header("Location: ../home.php");
    }
?>