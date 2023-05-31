<?php
    require_once '../include/db.php';

    $mail = filter_var(trim($_POST['mail']),FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
   
    $pass = md5($pass."ghjksa78235");

    $result = $mysql->query("SELECT * FROM `users` WHERE `mail` = 
    '$mail' AND  `password` = '$pass'");
    $user = $result->fetch_assoc();
    if(count($user )==0){
        echo "такой пользоватлеь не найден";
        exit();
    }

    setcookie('user',$user['name'], time() + 3600 * 24 * 7, "/");
    setcookie('user_admin',$user['admin'], time() + 3600 * 24 * 7, "/");
    
    header('Location: ../index.php');

?>