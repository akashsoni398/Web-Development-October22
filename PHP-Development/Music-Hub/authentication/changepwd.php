<?php

include '../dbconfig.php';
session_start();

if(isset($_POST['changepwd-inp'])) {
    $name = mysqli_real_escape_string($conn,$_SESSION['username']);
    $email = mysqli_real_escape_string($conn,$_SESSION['useremail']);
    $opwd = mysqli_real_escape_string($conn,$_POST['opwd-inp']);
    $npwd = mysqli_real_escape_string($conn,$_POST['npwd-inp']);
    $cnpwd = mysqli_real_escape_string($conn,$_POST['cnpwd-inp']);

    if($opwd!='' && $cnpwd!='' && $npwd!='' ) {
        if($npwd===$cnpwd) {
            $sql_query = "SELECT password as opwdhash FROM users WHERE email='".$email."';";
            $result = mysqli_query($conn,$sql_query);
            $row = mysqli_fetch_array($result);

            if(password_verify($opwd,$row['opwdhash'])==true) {
                $cipher_pwd = password_hash($npwd,PASSWORD_ARGON2I);
                $sql_query = "UPDATE users SET password='".$cipher_pwd."' WHERE email='".$email."';";
                $result = mysqli_query($conn,$sql_query);
                if($result) {
                    header('Location:login.php');
                }
                else {
                    echo "Password could not be changed. Contact Customer support";
                }
            }
            else {
                echo "Old password did not match";
            }
        }
        else {
            echo "New passwords entered did not match";
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
        <h1>Change Password</h1>
        <form action="" method="post">
            <input type="password" name="opwd-inp" id="opwd-inp" placeholder="Enter your old password" required />
            <input type="password" name="npwd-inp" id="npwd-inp" placeholder="Enter your new password" required />
            <input type="password" name="cnpwd-inp" id="cnpwd-inp" placeholder="Confirm your new password" required />
            <button type="submit" name="changepwd-inp">Change Password</button>
        </form>
    </div>
</body>
</html>