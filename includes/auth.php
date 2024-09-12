<?php
    session_start();
    include 'dbconnection.php';
    if($_GET['action'] == 'register'){
        $email = $_GET['email'];
        $username = $_GET['uname'];
        $password = $_GET['psw'];
        $msg = validation($email,$username,$password);
        if($msg != ""){
            $_SESSION["registerfail"] = $msg;
            echo $_SESSION["registerfail"];
            header("Location: ../home.php?msg=registerfail");
        }
        else{
            $addmsg = AddUser($email,$username,$password);
            if($addmsg == true){
                $_SESSION["registered"] = "Account Registered Successfully\\nProceed to Login";
                header("Location: ../home.php?msg=registersuccess");
            }
        }
        
        
/*
            function sanitize_my_email($field) {
            $field = filter_var($field, FILTER_SANITIZE_EMAIL);
            if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                return false;
            }
        }

        ini_set("SMTP","smtp.gmail.com" );
        ini_set("smtp_port","465");
        ini_set('sendmail_from', 'zile268426@gmail.com');   
        $to_email = $email;
        $subject = 'Testing PHP Mail';
        $message = 'This mail is sent using the PHP mail ';
        $headers = 'From: noreply @ company. com';
        //check if the email address is invalid $secure_check
        $secure_check = sanitize_my_email($to_email);
        if ($secure_check == false) {
            echo "Invalid input";
        } else { //send email 
            mail($to_email, $subject, $message, $headers);
            echo "This email is sent using PHP Mail";
        }
*/
    }

    if($_GET['action'] == 'login'){
        $user = checkLogin();
        $cookie_name = "user".$user[0];
        $_SESSION["userinfo"] = $user;
        $cookie_value = $user[1];
        if(isset($_GET['remember']) && $_GET['remember'] == 'on'){
            setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
        }
        else{
            setcookie($cookie_name, $cookie_value, time() + 10800, "/");
        }
        $_SESSION["cookie_name"] = $cookie_name;
        ?><script>history.go(-1);</script><?php
    }

    if($_GET['action'] == 'logout'){
        setcookie($_SESSION["cookie_name"], "", time() - 3600);
        unset($_SESSION["cookie_name"]);
        unset($_SESSION["userinfo"]);
        ?><script>history.go(-1);</script><?php
    }

    function validation($email,$username,$password){
        $errstring = "";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errstring = "Invalid email format\\n";
          }
        if(strlen($username) < 6){
            $errstring .= "Username must have at least 6 characters\\n";
        }
        if(strlen($password) < 8){
            $errstring .= "Password must have at least 8 characters";
        }
        return $errstring;
    }

    function AddUser($email,$username,$password){
        $salt = getSalt();
        $options['salt'] = $salt;
        $hashpsw = password_hash($password, PASSWORD_BCRYPT, $options);

        $conn = OpenCon();
        $sql = "INSERT INTO users (username, email_address, salt, password) VALUES ('$username', '$email', '$salt', '$hashpsw')";

        if(mysqli_query($conn,$sql)){
            return true;
        }
        else{
            return "Error when register account.";
        }

        CloseCon();
    }

    function getSalt() {
        $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randStringLen = 32;

        $randString = "";
        for ($i = 0; $i < $randStringLen; $i++) {
            $randString .= $charset[mt_rand(0, strlen($charset) - 1)];
        }
        return $randString;
    }

    function checkLogin(){
        $username = $_GET['uname'];
        $password = $_GET['psw'];

        $conn = OpenCon();
        $sql1 = "SELECT salt FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql1);
        if($result->num_rows > 0){
            $salt = $result->fetch_array()[0];
        }
        else{
            $_SESSION["loginerr"] = "User does not exists / ";
        }

        $options['salt'] = $salt;
        $hashpsw = password_hash($password, PASSWORD_BCRYPT, $options);
        $sql = "SELECT user_id,username,email_address,salt FROM users WHERE username='$username' AND password='$hashpsw'";
        $result = mysqli_query($conn, $sql);
        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $user = array($row["user_id"], $row["username"], $row["email_address"], $row["salt"]); 
            }
            return $user; 
        }
        else{
            $_SESSION["loginerr"] .= "Password does not match";    
        }
    }
?>