<?php
require_once 'assets/php/functions.php';

if (isset($_GET['newfp'])) {
    unset($_SESSION['auth_temp']);
    unset($_SESSION['forgot_email']);
    unset($_SESSION['forgot_code']);
}

if (isset($_SESSION['Auth'])) {
    $user = getUser($_SESSION['userdata']['id']);
}

$pagecount = count($_GET);

if (isset($_SESSION['Auth']) &&  $user['ac_status'] == 1 && !$pagecount) {
    showPage('header', ['page_title' => 'InstaShot Home']);
    showPage('navbar');
    showPage('wall');
} elseif (isset($_SESSION['Auth']) && $user['ac_status'] == 0 && !$pagecount) {
    showPage('header', ['page_title' => 'InstaShot - Verify Email']);
    showPage('verify_email');
} elseif (isset($_SESSION['Auth']) &&  $user['ac_status'] == 2 && !$pagecount) {
    showPage('header', ['page_title' => 'InstaShot - Blocked']);
    showPage('blocked');
} elseif (isset($_SESSION['Auth']) &&  isset($_GET['editprofile']) && $user['ac_status'] == 1) {
    showPage('header', ['page_title' => 'InstaShot Edit Profile']);
    showPage('navbar');
    showPage('edit_profile');
} elseif (isset($_GET['signup'])) {
    showPage('header', ['page_title' => 'InstaShot - Signup']);
    showPage('signup');
} elseif (isset($_GET['login'])) {
    showPage('header', ['page_title' => 'InstaShot - Login']);
    showPage('login');
} elseif (isset($_GET['forgotpassword'])) {
    showPage('header', ['page_title' => 'InstaShot - Forget Password']);
    showPage('forgot_password');
} else {
    if (isset($_SESSION['Auth']) && $user['ac_status'] == 1) {
        showPage('header', ['page_title' => 'InstaShot Home']);
        showPage('navbar');
        showPage('wall');
    } elseif (isset($_SESSION['Auth']) && $user['ac_status'] == 0) {
        showPage('header', ['page_title' => 'InstaShot - Verify Email']);
        showPage('verify_email');
    } elseif (isset($_SESSION['Auth']) &&  $user['ac_status'] == 2) {
        showPage('header', ['page_title' => 'InstaShot - Blocked']);
        showPage('blocked');
    } else {
        showPage('header', ['page_title' => 'InstaShot - Login']);
        showPage('login');
    }
}

showPage('footer');
unset($_SESSION['error']);
unset($_SESSION['formdata']);
