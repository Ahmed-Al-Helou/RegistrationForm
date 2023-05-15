<?php
session_start();
if(!isset($_COOKIE["statusLogin"]) && time() > $_COOKIE["cookie_name"]) {
    header("Location: ../index.php");
}else{
    $name = $_SESSION['userName'];
    $password =  $_SESSION['users'][$name]['password'];
    $email =  $_SESSION['users'][$name]['email'];
    $phone =  $_SESSION['users'][$name]['phone'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <title>User information</title>
</head>
<body>
    <div class="container">
     
        <h1 class="title">Personal Information</h1>

        <div class="Data">
            <h2>Full Name:</h2>
            <p class="info"><?php  echo $name ?></p>
        </div>

        <div class="Data">
            <h2>Email:</h2>
            <p class="info"><?php  echo $email ?></p>
        </div>

        <div class="Data">
            <h2>Phone:</h2>
            <p class="info"><?php  echo $phone ?></p>
        </div>


        <div class="Data">
            <h2>Password:</h2>
            <p class="info"><?php  echo $password ?></p>
        </div>

        <button class="logout"  style=" width: 250px; background: #9E9E9E; margin-left: 142px; margin-top: 39px; text-align: center; border-radius: 6px;  font-weight: bold; cursor: pointer; border:none; height:20px;">logout</button>

    </div>

    <script>
        const logout = document.querySelector(".logout");
        
        logout.addEventListener('click', ()=>{
            window.location.href = '../php/logout.php';
        })
    </script>
</body>
</html>