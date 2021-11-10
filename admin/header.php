<?php
    include 'conn.php';
   session_start();
   if(!isset($_SESSION['userName']) && !isset($_SESSION['password'])){
    header('location:'.$hosting.'/');
   }
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header section</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
    <script src="js/jquery.js"></script>
    <script src="js/header.js"></script>
    <section  id="header">
        <div class="container">
            <div id="topBar">
                <div id="logo">
                    <img src="image/today.png" alt="today.png">
                    <!-- <i class="fa fa-bars" id="bar" onclick="bar()"></i> -->
                </div>
                <div class="profile">
                  <?php 
                    echo "<p>Hello,".$_SESSION['firstName']." ".$_SESSION['lastName']."</p>";
                  ?>
                </div>
                <div id="logout">
                    <a href="logout.php">
                    <i class="fa fa-sign-out"></i>
                        Logout
                    </a>
                </div>    
            </div>
        </div>
    </section>
    <section id="navagation">
        <div class="container">
            <div id="nav">
                <ul>
                    <li><a href="post.php">Post</a></li>
                    <?php
                        if($_SESSION['userRole'] == 1){
                              echo '<li><a href="category.php">Categaries</a></li>';
                              echo '<li><a href="admin_home.php">';
                              echo '<i class="fa fa-user"></i>';
                              echo "User"; 
                              echo'</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </section>
</body>
</html>