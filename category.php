<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/indexs.css">
</head>

<body>
    <?php
        // checkint super global varibal get in name 
        include 'header.php';
        if(isset($_GET['name'])){
            $name = $_GET['name'];
        }else{
            $name = "Sport";
        }
    ?>
    <div class="container">
        <div id="category_name">
            <h1><?php echo $name;?></h1>
        </div>
        <div class="body">
            <div class="left">
                <?php 
                    include 'conn.php';
                    // checking super global variable set or not 
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page = 1;
                    }
                    $limit = 10;
                    $offset = ($page - 1)*$limit;
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                    }else{
                        $id = 1;
                    }
                    $sql = "select post.post_img,post.title,post.description,user.first_name,user.last_name,post.post_date,category.category_name,post.post_img,post.post_id,user.user_id from post
                            left join user on post.author = user.user_id
                            left join category on post.category = category.category_id
                            where category.category_id = $id
                            limit {$offset},{$limit}";
                            $result = mysqli_query($conn,$sql) or die('Query Error category page');
                            if(mysqli_num_rows($result) > 0){
                                while($res = mysqli_fetch_assoc($result)){
                ?>
                <aside>
                    <img src="admin/uploaded/<?php echo $res['post_img'];?>" alt="image" class="img">
                    <div class="information">
                        <h2><?php echo $res['title'];?></h2>
                        <a href="#" class='details'>
                        <i class="fa fa-tags"></i>
                        <?php echo $res['category_name'];?>
                        </a>
                        <a href="author.php?userId=<?php echo $res['user_id'];?>&name=<?php echo $res['first_name']." ".$res['last_name'];?>" class='details'>
                        <i class="fa fa-user"></i>
                        <?php echo $res['first_name'] ." ".$res['last_name'];?>
                        </a>
                        <span class='details'>
                        <i class="fa fa-calendar"></i>
                        <?php echo $res['post_date'];?>
                        </span>
                        <p><?php echo substr($res['description'],0,150)."....";?></p>
                        <a href="read_more.php?id= <?php echo $res['post_id'];?>" class="read">
                        <i class="fa fa-book"></i>  
                        Read More
                        </a>
                    </div>
                </aside>
                <?php
                                }
                            }
                            // paganation start 
                              $sql1 = "select *from post
                                       left join category on post.category = category.category_id
                                       where category.category_id = $id";
                                       $result1 = mysqli_query($conn,$sql1) or die("fetching total number query error");
                                       if(mysqli_num_rows($result1) > 0){
                                               $res1 = mysqli_num_rows($result1);
                                               $total_page =ceil($res1/$limit);
                                               echo "<ul class='page'>";
                                               if($page>1){
                                                   echo '<li><a href="category.php?page='.($page -1).'&id='.$id.'&name='.$name.'">Prev</a></li>';
                                               }
                                               for($i=1;$i<=$total_page;$i++){
                                                //    checking active id 
                                                   if($i == $page){
                                                       $active = "active";
                                                   }else{
                                                        $active = "";
                                                   }
                                                echo '<li><a href="category.php?page='.$i.'&id='.$id.'&name='.$name.'"id='.$active.'>'.$i.'</a></li>';
                                            }
                                            if($page<$total_page){
                                                echo '<li><a href="category.php?page='.($page +1).'&id='.$id.'&name='.$name.'">Next</a></li>';
                                            }
                                            echo "</ul>";
                                       }
                            ?>
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