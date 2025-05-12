<?php

require('db.php');


$error = '';
$loginError = '';
$username = '';
$password = '';
$password_conf = '';

if (isset($_POST['login-btn'])) {
    $user = selectOne('user', ['username' => $_POST['username']]);
    
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['message'] = 'Logged in';
        $_SESSION['type'] = 'success';

        header("location: ../../admin/news-admin");
        exit();   
    }
    else{
        $loginError = 'Нэвтрэх нэр эсвэл <br> нууц үг буруу байна.';
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
}

if(isset($_POST['register-btn'])) {
    
    if ($_POST['password_conf'] !== $_POST['password']){
        $error = 'Давтсан нууц үг таарахгүй байна.';
    }
    $existingUser = selectOne('user', ['username' =>$_POST['username']]);
    if (isset($existingUser)) {
        $error = 'Нэвтрэх нэр давхцаж байна.';
    }

    if (empty($error)) {
        unset($_POST['register-btn'], $_POST['password_conf']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
        $user_id = create('user', $_POST);
        $user = selectOne('user', ['id' => $user_id]);
        
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['message'] = 'Амжилттай нэвтэрлээ';

        header('location: ../../admin/news-admin');
        // display($_SESSION);
        exit(); 
        
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_conf = $_POST['password_conf'];
    }

    

}