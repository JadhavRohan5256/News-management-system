<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update our Post</title>
        <link rel="stylesheet" href="css/fetch_post_details.css">
    </head>
    
    <body>
        <?php
        include 'header.php';
        include 'conn.php';
        // when user are normal and enter other post id in url for editing post
        if($_SESSION['userRole']==0 ){
            $normal = "select *From post where post_id = {$_GET['id']}";
            $normal_result = mysqli_query($conn,$normal) or die('Query error');
            $fetch_normal = mysqli_fetch_assoc($normal_result);
            if($fetch_normal['author'] != $_SESSION['userId']){
                header('location:'.$hosting.'/post.php');
            }
    }

        ?>
    <div id="container">
        <div>
            <h1>Update Post</h1>
        </div>
        <?php 
            $post_id = $_GET['id'];
            $sql ="select *from post 
            left join category on category.category_id= post.category
            where post.post_id = {$post_id}"; 
            $result = mysqli_query($conn,$sql) or die("Query Error");
           
            if(mysqli_num_rows($result)>0){
                while($res = mysqli_fetch_assoc($result)){
                    ?>
        <form action="save_update_post.php" method="post" id="formCategory" enctype="multipart/form-data">
        <div>
            <input type="hidden" name="hidden" value="<?php echo $res['post_id'];?>">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Title" value="<?php echo $res['title'];?>">
            </div>
            <div>
                <label for="description">Description</label>
                <textarea id="textarea" name="description" rows="6">
                <?php echo $res['description'];?>
                    </textarea>
            </div>
            <div>
                <?php
                    $category = $res['category_id'];
                    $sql1 = "select *from category";
                    $result1 = mysqli_query($conn,$sql1) or die("qeuery can't fire");
                    if(mysqli_num_rows($result1)>0){
                        ?>
                <label for="category">Category</label>
                <select name="category" id="categorySelect">
                    <option disabled>Selete Category</option>
                    <?php 
                        while($res1 = mysqli_fetch_assoc($result1)){
                          if($res['category'] == $res1['category_id']){
                              $selected = "selected";
                              session_start();
                              $_SESSION['check']=$res['category'];
                          }else{
                              $selected = "";
                          }
                             echo "<option {$selected} value='{$res1['category_id']}''>{$res1['category_name']}
                    </option>";
                       }
                    }
                ?>
                </select>
            </div>
            <div>
                <input type="file" name="file" id="file">
                <img src="uploaded/<?php echo $res['post_img'];?>" alt="Img" id="imgUpdate">
                <input type="hidden" name="old_file" id="old_file" value="<?php echo $res['post_img'];?>">
            </div>

            <input type="submit" name="add" id="btn" value="Add">
        </form>
        <?php
                }
            }
        ?>
    </div>
</body>

</html>