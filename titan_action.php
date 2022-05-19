<?php
session_start();
error_reporting(0);
require "db/connection.php";
$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contactno = mysqli_real_escape_string($con, $_POST['contactno']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO users (name, email, contactno, password, code, userStatus, status)
                        values('$name', '$email', '$contactno', '$encpass', '$code', 1, '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: boutros.georges513@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE users SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $fetch_data['name'];

                header('location: products.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM users WHERE email = '$email' AND userStatus=1";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                $_SESSION['username'] = $fetch['name'];

                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                  $uip=$_SERVER['REMOTE_ADDR'];
                  $stat=1;
                  $log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('".$_SESSION['email']."','$uip','$stat')");
                    header('location: products.php');
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
              $uip=$_SERVER['REMOTE_ADDR'];
              $stat=0;
              $log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('$email','$uip','$stat')");
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It seems you're not yet a member! Click on the bottom link to signup.";
        }
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM users WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE users SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: boutros.georges513@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE users SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }

   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }

//REQUEST PRODUCT

  if(isset($_POST['requestProduct'])){
    $brand = $_POST['brand'];
    $series = $_POST['series'];
    $description = $_POST['description'];
    $requestStatus = 'successful';

    $query = mysqli_query($con, "insert into requestproduct (userEmail, brand, series, description, requestStatus, requestAvailability)
     values ('".$_SESSION['email']."', '$brand', '$series', '$description', '$requestStatus', 1)");

     $row=mysqli_fetch_array($query);
     header('location: products.php');
  }

//TITAN ACCOUNT REQUEST
  if(isset($_POST['updateaccount'])){
    $name = $_POST['name'];
    $contactno = $_POST['contactno'];

    $query= mysqli_query($con, "update users set name='$name', contactno='$contactno' where email='".$_SESSION['email']."'");
    $row= mysqli_fetch_array($query);
    header('location:products.php');
  }

//BILLING ADDRESSES REQUEST
  if(isset($_POST['billupdate'])){
    $billingaddress = $_POST['billingaddress'];
    $billingstate = $_POST['bilingstate'];
    $billingcity = $_POST['billingcity'];

  $query=mysqli_query($con,"update users set billingAddress='$billingaddress', billingState='$billingstate', billingCity='$billingcity',
  billingPincode=0 where email='".$_SESSION['email']."'");

    $row=mysqli_fetch_array($query);
    header('location:products.php');
  }

//SHIPPING ADDRESS REQUEST

  if(isset($_POST['shipupdate'])){
    $shippingaddress = $_POST['shippingaddress'];
    $shippingstate = $_POST['shippingstate'];
    $shippingcity = $_POST['shippingcity'];

    $query= mysqli_query($con, "update users set shippingAddress='$shippingaddress', shippingState='$shippingstate',
    shippingCity='$shippingcity', shippingPincode=0 where email='".$_SESSION['email']."'");

    $row = mysqli_fetch_array($query);
    header('location:products.php');
  }


?>
