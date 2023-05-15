<?php

require_once("./functionValidation.php");

    if(isset($_POST['submitData'])){

        $name = $_POST['name'];
        $email =$_POST['email'];
        $password = $_POST["password"];
        $phone =$_POST['phone'];

        $wrong = SignupValidation($name,$email,$password,$phone);
        if(count($wrong) == 0 ){
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
            $_SESSION['users'][$name] = array(
                "name" => $name,
                "email" => $email,
                "password" => $hashed_password,
                "phone" => $phone
            );
            $printMessageStatus = "<div style='padding:20px 80px;background-color:green;border-radius:10px;margin:25px'>Sign Is Successfully</div>";
            header("Location: ../index.php");
            exit;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/master.css">
    <title>Register</title>
</head>
<body>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <h3>Registration Form</h3>
    <?php

    if(!empty($printMessageStatus)){
        echo $printMessageStatus;
    }

    if(isset($_POST['submitData']) && isset($wrong['public'])){
        echo "<p style='color:red; text-align:center'>".$wrong['public'] ."</p>";
    }
    ?>

    <label for="username">Username</label>
    <input type="text" name="name" id="username" placeholder="UserName">
    <?php
    if(isset($wrong['name'])){
        echo "<p style='color:red'>".$wrong['name'] ."</p>";
    }
    ?>

    <label for="Email">Email</label>
    <input type="email" name="email" id="Email" placeholder="Email">

    <?php
    if(isset($wrong['email'])){
        echo "<p style='color:red'>".$wrong['email']."</p>";
    }
    ?>

    <label for="Password">Password</label>
    <input type="password" name="password" id="Password" placeholder="password">

    <?php
    if(isset($wrong['password'])){
        echo "<p style ='color:red'>".$wrong['password']."</p>";
    }
    ?>

    <label for="Phone">Phone</label>
    <input type="number" name="phone" id="Phone" placeholder="Phone">

    <?php
    if(isset($wrong['phone'])){
        echo "<p style='color:red'>".$wrong['phone']."</p>";
    }
    ?>

    <button type="submit" name="submitData">Signup</button>
    </form>

    
</body>
</html>