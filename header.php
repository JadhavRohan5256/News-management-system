<?php 
include 'conn.php';
    $pageTitle1 =basename($_SERVER['PHP_SELF']);
    switch($pageTitle1){
        case "search.php":
            if(isset($_GET['search'])){
                $pageTitle = $_GET['search'];
            }
            break;
        case "category.php":
            if(isset($_GET['id'])){
                $catId = $_GET['id'];
                $select = "select *From category where category_id = $catId";
                $cateidResult = mysqli_query($conn,$select) or die("category title");
                $fetched = mysqli_fetch_assoc($cateidResult);
                $pageTitle = $fetched['category_name'];
            }
            break;
        case "index.php":
            $pageTitle = "home";
            break;
        case "author.php":
            if(isset($_GET['name'])){
                $pageTitle =  $_GET['name'];
            }
            break;
            case "read_more.php":
                if(isset($_GET['id'])){
                    $catId = $_GET['id'];
                    $select = "select *From post
                               left join user on post.author = user.user_id
                                where post.post_id = $catId";
                    $cateidResult = mysqli_query($conn,$select) or die("category title");
                    $fetched = mysqli_fetch_assoc($cateidResult);
                    $pageTitle = $fetched['first_name']." ". $fetched['last_name']." News";
                }
                break;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $pageTitle;?>
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <header class="header">
        <div class="container head">
            <div class="logo">
                <img src="admin/image/today.png" alt="logo">
            </div>
            <div class="log_in">
                <a href="admin/index.php">Log In</a>
            </div>
        </div>
    </header>

    <div class="navagation">
        <!-- <div class="container"> -->
        <?php 
            include 'conn.php';
            $sql= "select *from category where post>0";
            $result = mysqli_query($conn,$sql) or die("Query Error:category");
            if(mysqli_num_rows($result)>0){
        ?>
        <ul class="nav">
            <div>
                <li>
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                        Home
                    </a>
                </li>
            </div>
            <!-- sideBar icons start -->
            <!-- <div class="bar"> -->
                <input type="checkbox" id="check">
                <label for="check" class="sideBarIcon">
                    <div class="spinner top"></div>
                    <div class="spinner middle"></div>
                    <div class="spinner bottom"></div>
                </label>
            <!-- </div> -->
            <!-- sideBar icons end  -->
            <div id='navBar'>
                <?Php 
                    while($res = mysqli_fetch_assoc($result)) {
                        echo '<li><a href="category.php?id='.$res['category_id'].'&name='.$res['category_name'].'">';
                        if($res['category_id'] == 1){
                            echo '<i class="fa fa-futbol-o"></i>';
                        }elseif($res['category_id'] == 2){
                            echo '<i class="fa fa-film"></i>';
                        }elseif($res['category_id'] == 3){
                            echo '<i class="fa fa-flag"></i>';
                        }elseif($res['category_id'] == 4){
                            echo '<i class="fa fa-medkit"></i>';
                        }elseif($res['category_id'] == 5){
                            echo '<i class="fa fa-graduation-cap"></i>';
                        }
                        echo $res['category_name'];
                        echo'</a></li>';
                    }
                    } 
                ?>
            </div>
        </ul>
    </div>
</body>

</html>