<?php

include '../dbconfig.php';

if(isset($_POST['login-inp'])) {
    $email = mysqli_real_escape_string($conn,$_POST['email-inp']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd-inp']);

    if($email!='' && $pwd!='') {
        $sql_query = "SELECT count(*) AS UserCount FROM users WHERE email='".$email."';";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);
        $count = $row['UserCount'];
        if($count>0) {
            $sql_query = "SELECT name as username,email as useremail,password as pwdhash FROM users WHERE email='".$email."';";
            $result = mysqli_query($conn,$sql_query);
            $row = mysqli_fetch_array($result);

            if(password_verify($pwd,$row['pwdhash'])==true) {
                session_start();
                $_SESSION['username']=$row['username'];
                $_SESSION['useremail']=$row['useremail'];
                header('Location:../index.php');
            }
            else {
                echo "Username and password does not exist";
            }
            
        }
        else {
            echo "Username or password does not exist";
        }
    }
    else {
        echo "Username or password not entered";
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
            transform: translateY(50%);
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
        <h1>Login Page</h1>
        <form action="" method="post">
            <input type="email" name="email-inp" id="email-inp" placeholder="Enter your email address" required />
            <input type="password" name="pwd-inp" id="pwd-inp" placeholder="Enter your password" required />
            <button type="submit" name="login-inp">LOGIN</button>
        </form>
    </div>
</body>
</html>