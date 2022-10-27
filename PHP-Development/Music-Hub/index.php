<?php

include 'dbconfig.php';
session_start();

if(isset($_GET['logout'])) {
    session_destroy();
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        * {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin: 0;
            padding: 0;
        }
        #header {
            background-color: #111;
            text-align: right;
        }
        #header>a {
            color: white;
            text-decoration: none;
            font-size: 15px;
            margin-right: 30px;
        }
        #dropdown {
            display: inline-block;
            position: relative;
        }
        #dropdown button {
            border: none;
            background-color: forestgreen;
            color: white;
            font-size: 20px;
            padding: 5px 25px;
            font-family:Arial, Helvetica, sans-serif;
            font-weight: bold;
        }
        #header #dropdown-content {
            position: absolute;
            right: 0;
            visibility:collapse;
            z-index: 1;
        }
        
        #header #dropdown-content a {
            display:block;
            white-space: nowrap;
            text-decoration: none;
            color: black;
            background-color: rgb(219, 219, 219);
            padding: 10px 20px;
        }
        #dropdown:hover button {
            background-color: darkgreen;
        }
        #dropdown:hover #dropdown-content {
            visibility: visible;
        }
        #header #dropdown-content a:hover {
            background-color: #999;
        }
        #logo-section {
            z-index: 0;
            position: relative;
            background-color: #fdca16;
            height: 150px;
        }
        img[src='assets/images/logo.gif'] {
            height: 150px;
            width: 150px;
        }
        .left-align {
            position: absolute;
            left:0;
            width: 100%;
        }
        .right-align {
            position: absolute;
            right:0;
            width: 100%;
        }
        #logo-section h1 {
            position: absolute;
            top:8px;
            left:160px;
            white-space: nowrap;
            font-family: fantasy;
            font-size: 75px;
            font-weight: normal;
        }
        #logo-section p {
            position: absolute;
            top:88px;
            left:160px;
            white-space: nowrap;
            font-size: 19.3px;
        }
        
        #logo-section form input{
            position: absolute;
            width: 280px;
            height: 30px;
            right: 40px;
            top: 60px;
            border: none;
            padding: 10px;
            padding-right: 30px;
            border-radius: 30px 30px 30px 30px;
        }
        #logo-section form button {
            position: absolute;
            width: 30px;
            height: 30px;
            right: 40px;
            top: 60px;
            border: none;
            border-radius: 0px 30px 30px 0px;
            background-color: transparent;
        }
        #menubar {
            background-color: #333;
        }
        #menubar ul {
            display: flex;
            flex-direction: row;
            list-style-type: none;
            justify-content:center;
        }
        #menubar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 50px;
            font-size: 20px;
            white-space: nowrap;
        }
        #menubar a:hover {
            background-color: #111;
        }
        #menubar .active {
            background-color: forestgreen;
        }
        #menubar .active:hover {
            background-color: darkgreen;
        }
        @media only screen and (max-width:1100px){
            #menubar a {
                padding: 10px 40px;
            }
            #menubar {
                background-color: #999;
            }
        }
        @media only screen and (max-width:960px){
            #menubar a {
                padding: 10px 30px;
            }
        }
    </style>
</head>
<body>
    <section id="header">
        <a href="legal/privacy.html">Privacy Policy</a>
        <a href="legal/tnc.html">Terms and Conditions</a>
        
        <?php if(!isset($_SESSION['username'])) { ?>
            <div id="dropdown">
                <button>LOGIN</button>
                <div id="dropdown-content">
                    <a href="authentication/login.php">Login into existing account</a>
                    <a href="authentication/register.php">Create a new account</a>
                </div>
            </div>
        <?php } else { ?>
            <div id="dropdown">
                <button><?php echo $_SESSION['username'] ?></button>
                <div id="dropdown-content">
                    <a href="authentication/changepwd.php">Change passowrd</a>
                    <a href="index.php?logout=true">Logout</a>
                </div>
            </div>
        <?php } ?>


    </section>
    <section id="logo-section">
        <div class="left-align">
            <img src="assets/images/logo.gif" alt="Music Hub logo">
            <h1>MUSIC HUB</h1>
            <p>----------------------------------------------------<br>One stop shop for all your musical needs</p>
        </div>
        <div class="right-align">
            <form method="get" action="search.html">
                <input type="search" name="keyword" placeholder="search for songs, artists, playlists, etc...">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </section>
    <section id="menubar">
        <ul>
            <li><a class="active" href="index.html">Home</a></li>
            <li><a href="recent.html">Recently Added</a></li>
            <li><a href="fav.html">Favourites</a></li>
            <li><a href="newhits.html">New Hits</a></li>
            <li><a href="playlists.html">Playlists</a></li>
            <li><a href="about.html">About Us</a></li>
        </ul>
    </section>
    <section id="web-content">
        <div class="row row-cols-1 row-cols-md-3 g-4 m-5">

        <?php
        $sql_query = "SELECT id,name,dor,doa,album,views,singer,composer,songwriter,label,starring,image,link FROM music;" ;
        $result = mysqli_query($conn,$sql_query);
        while($row = mysqli_fetch_array($result)) {
        ?>

            <div class="col">
                <div class="card h-100">
                <img src="assets/musicimg/<?php echo $row['image'] ?>" class="card-img-top" alt="...">
                <audio controls>
                    <source src="assets/music/<?php echo $row['link'] ?>" />
                </audio>
                <div class="card-body">
                    <a href="songdesc.php?song=<?php echo $row['id'] ?>">
                        <h5 class="card-title " style="text-align: center;"> <?php echo $row['name'] ?> </h5>
                    </a>
                    <p class="card-text"> <?php echo "Album:",$row['album'],"<br>Singer:",$row['singer'],"<br>Composer:",$row['composer'],"<br>Songwriter:",$row['songwriter'],"<br>Label:",$row['label'],"<br>Starring:",$row['starring'] ?> </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
                </div>
            </div> 

        <?php } ?>
        </div>
    </section>
    
    <section id="footer"></section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>