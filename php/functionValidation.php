<?php

session_start();

function SignupValidation($name,$email,$password,$phone){
    $error = [];
    if(empty($name) || empty($email) || empty($password) || empty($phone) ){
        $error['public'] = "Please Fill In All Input Fields ";
    }else{
        // Check name pattern
        if(!preg_match("/^[a-zA-Z ]{3,}+$/",$name)){
        $error['name'] = "please enter your name more than 3 character";

        }

        //Check email pattern
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error['email'] = "please enter email contain the end is @gmail.com";

        }

        //Check password pattern
        if(!preg_match("/^[A-Z]+[a-z]{7,}$/" , $password)){
            $error['password'] = "please enter the password contain one capital letter and more than 7 character. ";
        }
        
        //Check phone pattern
        if(!preg_match("/^059\d{7,}$/",$phone)){
            $error['phone'] = "please enter the phone starts with 059 and is followed by at least seven digits.";

        }
    }

    return $error;
};


function LoginValidation($email,$password){
    $errors =[];

    if(empty($email) || empty($password)){
        $errors['public'] = "Please fill both in Email and password !";
    }else{
        if(isset($_SESSION['users'][$email])){
            $userPassword = $_SESSION['users'][$email]['password'];

            if(password_verify($password,$userPassword)){
                $_SESSION['Email'] = $email;
                setcookie("statusLogin", true, time() + (20 * 60)); 
                header("refresh:0;url=./php/showData.php");
            }else{
                $errors['public'] = "Incorrect Email or password";
            }    
        }else{
            $errors['public'] = "Incorrect Email or password";
        }
    }
    return $errors;

};
