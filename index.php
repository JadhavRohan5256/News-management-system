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
        include 'header.php';
    ?>
    <div class="container">
        <div class="body">
            <div class="left">
                <?php
                    include 'conn.php';
                    $limit = 4;
                    if(isset($_GET['page'])==true){
                        $page = $_GET['page'];
                    }
                    else{
                        $page = 1;
                    }
                    $offset = ($page-1)*$limit;

                    $sql ="select post.title,category.category_name,user.first_name,user.last_name,post.post_date,post.description,post.post_img,post.post_id,category.category_id,user.user_id from post 
                          left join user on post.author = user.user_id
                          left join category on post.category = category.category_id limit {$offset},{$limit}";
                          $result = mysqli_query($conn,$sql) or die("Query Error");
                          if(mysqli_num_rows($result)>0){
                              while($res = mysqli_fetch_assoc($result)){
                ?>
                <aside>
                    <img src="admin/uploaded/<?php echo $res['post_img'];?>" alt="image" class="img">
                    <div class="information">
                        <h2><?php echo $res['title'];?></h2>
                            <a href="category.php?id=<?php echo $res['category_id'];?>&name=<?php echo $res['category_name'];?>" class="details">
                                <i class="fa fa-tags"></i>
                            <?php echo $res['category_name'];?>
                           </a>
                        <a href="author.php?userId=<?php echo $res['user_id'];?>&name=<?php echo $res['first_name']." ".$res['last_name'];?>" class='details'>
                        <i class="fa fa-user"></i>
                        <?php echo $res['first_name']." ".$res['last_name'];?>
                    </a>
                         <span class='details'>
                            <i class="fa fa-calendar"></i>
                        <?php echo $res['post_date'];?>
                        </span>
                        <p><?php echo substr($res['description'],0,150);?></p>
                        <a href="read_more.php?id= <?php echo $res['post_id'];?>" class="read">
                        <i class="fa fa-book"></i>  
                            Read More
                        </a>
                    </div>
                </aside>
                <?php
                              }
                          }
                          $sql1 = "select *from post";
                          $result1 = mysqli_query($conn,$sql1) or die("totle record not found");
                          if(mysqli_num_rows($result1)>0){
                            $totle = mysqli_num_rows($result1);
                            $totle_page = ceil($totle/$limit);
                            echo '<ul class="page">';
                            if($page>1){
                                echo "<li><a href='index.php?page=".($page -1)."'id='prev'>prev</a></li>";
                            }
                            for($i=1;$i<=$totle_page;$i++){
                                if($i == $page){
                                    $active ="active";
                                }else{
                                    $active = "";
                                }
                                echo '<li><a href="index.php?page='.$i.'" id="'.$active.'">'.$i.'</a></li>';
                            }
                            if($page<$totle_page){
                                echo "<li><a href='index.php?page=".($page +1)."'id='prev'>prev</a></li>";
                            }
                            echo '</ul>';
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