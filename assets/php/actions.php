<?php
require_once 'functions.php';
require_once 'send_code.php';

if (isset($_GET['signup'])) {
    $response = validateSignupForm($_POST);
    if ($response['status']) {
        if (createUser($_POST)) {
            header("location:../../?login&newuser");
        } else {
            echo "<script>alert('Something is wrong')</script>";
        }
    } else {
        $_SESSION['error'] = $response;
        $_SESSION['formdata'] = $_POST;
        header('location:../../?signup');
    }
}

if (isset($_GET['login'])) {
    $response = validateLoginForm($_POST);
    if ($response['status']) {
        $_SESSION['Auth'] = true;
        $_SESSION['userdata'] = $response['user'];
        if ($response['user']['ac_status'] == 0) {
            $_SESSION['code'] = $code = rand(111111, 999999);
            sendCode($response['user']['email'], 'Verify your email', $code);
        }
        header('location:../../');
    } else {
        $_SESSION['error'] = $response;
        $_SESSION['formdata'] = $_POST;
        header('location:../../?login');
    }
}


if (isset($_GET['resend_code'])) {
    $_SESSION['code'] = $code = rand(111111, 999999);
    sendCode($_SESSION['userdata']['email'], 'Verify your email', $code);
    header('location:../../?resended');
}

if (isset($_GET['verify_email'])) {
    $user_code = $_POST['code'];
    $code =  $_SESSION['code'];

    if ($code == $user_code) {
        if (verifyEmail($_SESSION['userdata']['email'])) {
            header('location:../../');
        } else {
            echo "Something is wrong";
        }
    } else {
        $response['msg'] = 'Invalid verification code !';
        if (!$_POST['code']) {
            $response['msg'] = 'Enter 6 Digit Code Sended to You';
        }
        $response['field'] = 'email_verify';
        $_SESSION['error'] = $response;
        header('location:../../');
    }
}

if (isset($_GET['forgotpassword'])) {
    if (!$_POST['email']) {
        $response['msg'] = "Enter your email address";
        $response['field'] = 'email';
        $_SESSION['error'] = $response;
        header('location:../../?forgotpassword');
    } elseif (!isEmailRegistered($_POST['email'])) {
        $response['msg'] = "Email is not registered";
        $response['field'] = 'email';
        $_SESSION['error'] = $response;
        header('location:../../?forgotpassword');
    } else {
        $_SESSION['forgot_email'] = $_POST['email'];
        $_SESSION['forgot_code'] = $code = rand(111111, 999999);
        sendCode($_POST['email'], 'Forget your password ?', $code);
        header('location:../../?forgotpassword&resended');
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('location:../../');
}


if (isset($_GET['verifycode'])) {
    $user_code = $_POST['code'];
    $code =  $_SESSION['forgot_code'];

    if ($code == $user_code) {
        $_SESSION['auth_temp'] = true;
        header('location:../../?forgotpassword');
    } else {
        $response['msg'] = 'Invalid verification code !';
        if (!$_POST['code']) {
            $response['msg'] = 'Enter 6 Digit Code Sended to You';
        }
        $response['field'] = 'email_verify';
        $_SESSION['error'] = $response;
        header('location:../../?forgotpassword');
    }
}

if (isset($_GET['changepassword'])) {
    if (!$_POST['password']) {
        $response['msg'] = "Enter your new password";
        $response['field'] = 'password';
        $_SESSION['error'] = $response;
        header('location:../../?forgotpassword');
    } else {
        resetPassword($_SESSION['forgot_email'], $_POST['password']);
        header('location:../../?reseted');
    }
}

if(isset($_GET['updateprofile'])){
    $response = validateUpdateForm($_POST, $_FILES['profile_pic']);
  if ($response['status']) {
      if (updateprofile($_POST,$_FILES['profile_pic'])){
        header('location:../../?editprofile&success');
      }else{
        echo "Something is wrong";
      } 
    } else {
        $_SESSION['error'] = $response;
        header('location:../../?editprofile');
    } 
}

if(isset($_GET['addpost'])){
    $response = validatePostImage($_FILES['post_img']);

    if($response['status']){
        if(createPost($_POST, $_FILES['post_img'])){
            header('location:../../?new_post_added');
        }else{
            echo "something went wrong";
        }
    }else{
        $_SESSION['error'] = $response;
        header('location:../../');
    }
}
