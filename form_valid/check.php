<?php
    require_once '../include/db.php';

    $name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING)    . " " .
         filter_var(trim($_POST['secondName']),FILTER_SANITIZE_STRING) . " ";

    $mail = filter_var(trim($_POST['mail']),FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

   if(mb_strlen($name) < 5 || mb_strlen($name) > 90){
        echo "Длинна логина не допустима";
        exit();
   }
   
   $pass = md5($pass."ghjksa78235");


    $mysql->query("INSERT INTO `users` (`name`, `password`, `mail`) 
    VALUES('$name','$pass','$mail')");

     header('Location: ../index.php');


?>