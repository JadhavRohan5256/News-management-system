<?php
    include 'conn.php';
    $post_id = $_POST['hidden'];
    // validation of title 
    if(empty($_POST['title'])==true){
         "<p id='title'>Title should not be empty<p>";
    }else{
          $title = trim(mysqli_real_escape_string($conn,$_POST['title']));
    }
    // validation of description 
    if(empty($_POST['description'])==true){
         "<p id='description'>Description should not be empty<p>";
    }else{
          $descriptions = trim(mysqli_real_escape_string($conn,$_POST['description']));
    }
        $category =$_POST['category'];
       
    //   uploading image file in folder

    if(empty($_FILES['file']['name'])){
         $file_name = $_POST['old_file'];
    }else{
        if(isset($_FILES['file'])){
            $error = array();
             $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
           $file_tmp = $_FILES['file']['tmp_name'];
            $file_ext = end(explode('.',$file_name));
            $file_extension = array('jpeg','jpg','png');
            if(in_array($file_ext,$file_extension) === false){
                $error[] = "This file extension not allowed please uploade jpg , png ,jpeg formate image";
            }
            if($file_size>2096152){
                $error[] = "File must smaller than 2mb";
            }
            if(empty($error) == true){
                move_uploaded_file($file_tmp,"uploaded/".$file_name);
            }else{
                print_r($error);
            }
    
          }
    }  
    // checking if new image is uploaded then existing image will be deleted 
         if($_POST['old_file'] ==  $file_name){

        }else{
             $sqll = "select *from post where post_id = $post_id";
             $results = mysqli_query($conn,$sqll) or die("select query cant not fire");
             while($resu = mysqli_fetch_assoc($results)){

                  unlink('uploaded/'.$resu['post_img']);
             }
         }
         session_start();
        if( $_SESSION['check'] == $category){
            
        }else{
            $post = "UPDATE category SET post = post-1 where category_id = {$_SESSION['check']}";
            $post1 = "UPDATE category SET post = post+1 where category_id = {$category}";
            $resu = mysqli_query($conn,$post) or die('update post errror');
            $resu1 = mysqli_query($conn,$post1) or die('update post errror');
             $checking = mysqli_multi_query($conn,$post) or die('update query error');
        }

            $sql = "UPDATE post SET title = '{$title}',description = '{$descriptions}',category = '{$category}',post_img = '{$file_name}' where post_id = {$post_id}";
             $result = mysqli_query($conn,$sql) or die("Query Error");
             mysqli_close($conn);
             header('location:'.$hosting.'/post.php');
    ?>