<?php
require_once("./php/functionValidation.php");
if(isset($_POST['submitData'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $error = LoginValidation($name,$password);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
    <link rel="stylesheet" href="./style/master.css">
    <title>Login </title>
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

    <h3>Login</h3>
    <?php
    if (isset($_POST['submitData']) && isset($error['public'])) {
        echo "<p style='color:red; text-align:center; padding-top:10px;'>".$error['public'] ."</p>";
    }

    ?>
    <label for="Name">Name :</label>
    <input type="text" placeholder="Username" name="name" id="Name">

    <label for="password">Password :</label>
    <input type="password" placeholder="Password" name="password" id="password">

    <button type="submit" name="submitData">Log In</button>

    <p style="margin-top: 20px;font-size:13px">Do You Not Have An Account?<a href="php/signup.php">Create Account</a></p>

</div>
</body>
</html>
