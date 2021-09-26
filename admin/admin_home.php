<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/admin_home.css">
</head>

<body>
    <?php
     include 'header.php';
     if($_SESSION['userRole'] == 0){
         header('location:'.$hosting.'/post.php');
     }
   ?>
    <div class="container">
        <div id="title">
            <h1>Add User</h1>
            <a href="add_user.php">Register</a>
        </div>
    </div>
    <div class="container">
        <table>
            <?php
            $limit = 2;
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            $offset = ($page-1)*$limit;
            include 'conn.php';
            $sql = "select *from user limit {$offset},{$limit}";
            $result = mysqli_query($conn,$sql) or die("Query Error");
            if(mysqli_num_rows($result)>0){
        ?>
            <thead>
                <tr>
                    <th>SR.NO</th>
                    <th>FULL NAME</th>
                    <th>USER NAME</th>
                    <th>USER ROLE</th>
                    <th>REGISTER DATE</th>
                    <th>EDIT</th>
                    <!-- <th>DELETE</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                  while($res = mysqli_fetch_assoc($result)){
                      ?>
                <tr>
                    <td>
                        <?php echo $res['user_id'];?>
                    </td>
                    <td>
                        <?php echo $res['first_name'].$res['last_name'];?>
                    </td>
                    <td>
                        <?php echo $res['user_name'];?>
                    </td>
                    <?php
                    if($res['user_role']== 0){
                       echo "<td>Normal</td>";
                    }else{
                        echo "<td>Admin</td>";
                    }
                    ?>
                    <td>
                        <?php echo $res['register_date'];?>
                    </td>
                    <td><a href="edit.php"><i class="fa fa-pencil-square-o"></i></a></td>
                    <!-- <td><a href="delete.php?id=<?php echo $res['user_id'];?>"><i class="fa fa-trash"></i></a></td>   -->
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <?php
            }
            $sql1 = "select *from user";
            $result1 = mysqli_query($conn,$sql1) or die("Query Error");
            if(mysqli_num_rows($result1)>0){
               $totle = mysqli_num_rows($result1);
               
               $totle_page = ceil($totle/$limit);

               echo "<ul id='pagenation'>";
               if($page>1){
               echo "<li><a href='admin_home.php?page=".($page -1)."'id='prev'>prev</a></li>";
               }
               for($i=1;$i<=$totle_page;$i++){
                   if($i==$page){
                    $activat = "background-color:#fff000;";
                    }else{
                        $activat = "";
                    }
                       echo '<li><a href="admin_home.php?page='.$i.'" style='.$activat.'>'.$i.'</a></li>';
                }
                if($totle_page>$page){
                    echo "<li><a href='admin_home.php?page=".($page +1)."' id='next'>next</a></li>";
                }
                echo "</ul>";
            }
        ?>
    </div>
</body>

</html>