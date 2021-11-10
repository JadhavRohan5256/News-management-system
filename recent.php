<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/indexs.css">
</head>

<body>
   
     
                    <h2>recent posts</h2>
                    <?php
                    include 'conn.php';
                    $limit = 5;


                    $sql ="select post.title,category.category_name,user.first_name,user.last_name,post.post_date,post.description,post.post_img,post.post_id,category.category_id,user.user_id from post 
                          left join user on post.author = user.user_id
                          left join category on post.category = category.category_id
                           ORDER BY post.post_id DESC LIMIT $limit";
                          $result = mysqli_query($conn,$sql) or die("Query Error");
                          if(mysqli_num_rows($result)>0){
                              while($res = mysqli_fetch_assoc($result)){
                                  
                ?>
                    <div class="box">
                        <div class="div">
                            <img src="admin/uploaded/<?php echo $res['post_img'];?>" alt="image" class="img1">
                            <div class="info">
                                <h5>
                                    <?php echo $res['title'];?>
                                </h5>
                                <a href="category.php?id=<?php echo $res['category_id'];?>&name=<?php echo $res['category_name'];?>" class="a">
                                    <i class="fa fa-tags tag"></i>
                                    <?php echo $res['category_name'];?>
                                </a> 
                                <span class="a">
                                    <i class="fa fa-calendar"></i>
                                    <?php echo $res['post_date'];?>
                                </span>
                                <a href="read_more.php?id= <?php echo $res['post_id'];?>#left"  class="more a">
                                  More
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- box div  -->
                <?php
                         }
                     }
           
                 ?>
                 <!-- <li><a href="#" id="active">1</a></li> -->


            

            <!-- left section  -->
        <!-- </div>
    </div> -->
</body>

</html>