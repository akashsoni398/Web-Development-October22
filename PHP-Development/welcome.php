<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  echo $_POST['username']," : ",$_POST['password'];
    session_start();
    echo "<br>",$_SESSION['username'];
    session_destroy();
    echo "<br>",$_SESSION['username'];
    ?>
</body>
</html>