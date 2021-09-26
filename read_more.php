<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/read_more.css">
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <div class="container">
        <div class="body">
            <div class="left">
                <?php
                    include 'conn.php';
                  $post = $_GET['id'];
                  $sql = "select post.title,category.category_name,user.first_name,user.last_name,post.post_date,post.description,post.post_img from post
                          left join user on post.author = user.user_id
                          left join category on post.category = category.category_id
                          where post.post_id = {$post}";
                            $result = mysqli_query($conn,$sql) or die("Query error");
                            if(mysqli_num_rows($result) > 0){
                                while($res = mysqli_fetch_assoc($result)){
                ?>
                <!-- <aside> -->
                    <div class="titled">
                        <h1><?php echo $res['title'];?></h1>
                        <a href="#" class='details'>
                        <i class="fa fa-tags"></i>
                        <?php echo $res['category_name'];?>
                        </a>
                        <a href="#" class='details'>
                        <i class="fa fa-user"></i>
                        <?php echo $res['first_name']." ".$res['last_name'];?>
                        </a>
                        <span class='details'>
                            <i class="fa fa-calendar"></i>
                            <?php echo $res['post_date'];?>
                        </span>
                        <img src="admin/uploaded/<?Php echo $res['post_img'];?>" alt="image" class="images">
                    </div>
                        <p class="para"><?php echo $res['description'];?></p>
                <!-- </aside> -->
                <?php
                                }
                            }
                ?>
                <!-- <li><a href="#" id="active">1</a></li> -->
                
                
            </div>

            <!-- left section  -->
            <div class="right">
                <article>
                <!-- search file included  -->
                 <?php include 'search_bar.php';?>
                </article>
                <div class="recent">
                    <!-- file are included -->
                   <?php include 'recent.php';?>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>

</html>