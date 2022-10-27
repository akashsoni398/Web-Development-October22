<?php

include '../dbconfig.php';

if(isset($_POST['register-inp'])) {
    $name = mysqli_real_escape_string($conn,$_POST['name-inp']);
    $email = mysqli_real_escape_string($conn,$_POST['email-inp']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd-inp']);
    $cpwd = mysqli_real_escape_string($conn,$_POST['cpwd-inp']);

    if($name!='' && $email!='' && $pwd!='' && $cpwd!='' ) {
        if($pwd===$cpwd) {
            $cipher_pwd = password_hash($pwd,PASSWORD_ARGON2I);
            $sql_query = "INSERT INTO users (name,email,password) VALUES ('".$name."','".$email."','".$cipher_pwd."');";
            $result = mysqli_query($conn,$sql_query);
            if($result) {
                header('Location:login.php');
            }
            else {
                echo "Account already exists";
            }
        }
        else {
            echo "Passwords entered did not match";
        }
        
    }
    else {
        echo "All fields need to be filled";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Music Hub</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        #container {
            margin: auto;
            width: 50%;
            height: 50%;
            text-align: center;
            border: 2px solid grey;
            border-radius: 30px;
            transform: translateY(20%);
        }
        h1 {
            padding: 20px;
            background-color: cornflowerblue;
            border-radius: 28px 28px 0px 0px;
            color: white;
        }
        form {
            padding: 40px;
        }
        form input {
            display: block;
            width: 90%;
            text-align: center;
            font-size: 15px;
            padding:5px;
            margin: 20px auto;
            border: 1px solid black;
        }
        form button {
            background-color: cornflowerblue;
            font-size: 15px;
            font-weight: bold;
            color: white;
            padding:10px 20px;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Registration Page</h1>
        <form action="" method="post">
            <input type="text" name="name-inp" id="name-inp" placeholder="Enter your full name" required />
            <input type="email" name="email-inp" id="email-inp" placeholder="Enter your email address" required />
            <input type="password" name="pwd-inp" id="pwd-inp" placeholder="Enter your password" required />
            <input type="password" name="cpwd-inp" id="pwd-inp" placeholder="Confirm your password" required />
            <button type="submit" name="register-inp">LOGIN</button>
        </form>
    </div>
</body>
</html>