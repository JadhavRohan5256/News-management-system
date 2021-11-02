<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/post.css">
</head>

<body>
    <?php
          include 'header.php';
        ?>
    <div class="container">
        <div id="title">
            <h1>Your Post</h1>
            <a href="add_post.php">Add Post</a>
        </div>
    </div>
    <div class="container">
        <?php
            if(isset($_GET['page'])){
                $page = $_GET['page'];

            }else{
                $page=1;
            }
            if($_SESSION['userRole'] == 1){
                $limit = 10;
            }else{
                $limit = 3;
            }
            $user_id =$_SESSION['userId'];
            $offset = ($page-1)*$limit;
            if($_SESSION['userRole'] == 1){
                $sql = "select *from post 
                left join category on category.category_id= post.category
                left join user on post.author = user.user_id
                limit {$offset},{$limit}";
            }elseif($_SESSION['userRole'] == 0){
                $sql = "select *from post 
                left join category on category.category_id= post.category
                left join user on post.author = user.user_id
                where post.author = {$user_id}
                limit {$offset},{$limit}"; 
            }
            include 'conn.php';
            $result = mysqli_query($conn,$sql) or die('Query Error');
            if(mysqli_num_rows($result) > 0){
        ?>
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>CATEGORY</th>
                        <th>DATE</th>
                        <th>AUTHOR</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     while($res = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td>
                            <?php echo $res['post_id'];?>
                        </td>
                        <td>
                            <?php echo $res['title'];?>
                        </td>
                        <td>
                            <?php echo $res['category_name'];?>
                        </td>
                        <td>
                            <?php echo $res['post_date'];?>
                        </td>
                        <td>
                            <?php echo $res['first_name'] ." ".$res['last_name'];?>
                        </td>
                        <td><a href="fetch_post_details.php?id=<?php echo $res['post_id'];?>"><i
                                    class="fa fa-pencil-square-o"></i></a></td>
                        <td><a
                                href="delete.php?id=<?php echo $res['post_id'];?>& postId=<?php echo $res['category_id'];?>"><i
                                    class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php
                      }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        }
        // checking user role 
        if($_SESSION['userRole'] == 1){
            $sql1="select *from post";
        }else{
            $userId = $_SESSION['userId'];
            $sql1="select *from post
            left join user on post.author = user.user_id
            where user.user_id = $userId";
        }
        $result1 = mysqli_query($conn,$sql1) or die("Query eroor of paganation");
        if(mysqli_num_rows($result)>0){
            $total = mysqli_num_rows($result1);
            $total_page =ceil($total/$limit);
            echo '<ul id="pagenation">';
            if($page>1){
                echo '<li><a href="post.php?page='.($page-1).'">prev</a></li>';
            }
            for($i=1;$i<=$total_page;$i++){
                if($i==$page){
                    $active ='background-color:#fff000;';
                }else{
                    $active='';
                }
                echo '<li><a href="post.php?page='.$i.'" style='.$active.'>'.$i.'</a></li>';
            }
            if($total_page>$page){
                echo "<li><a href='post.php?page=".($page +1)."'id='prev'>next</a></li>";
                }
            echo "</ul>";
        }
        ?>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>