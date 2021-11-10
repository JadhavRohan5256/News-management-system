<?php
// Uploading file in folder of uploaded
if(isset($_FILES['file'])){
    $error = array();
    
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_ext = end(explode('.',$file_name));
    $extension = array('jpeg','jpg','png');
    if(in_array($file_ext,$extension) ===  false){
        $error[]="this extension not allowed plese upload jpg and png formate";  
    }
    if($file_size>5242880){
        $error[]="File size must smaller than 5mb";
    }
    if(empty($error)==true){
        move_uploaded_file($file_tmp,"uploaded/".$file_name);
    }else{
        print_r($error);
        die();
    }
}
//Uploading data in database 
if(isset($_POST['add'])){
    
    include 'conn.php';
       $title = mysqli_real_escape_string($conn,$_POST['title']);
       $description = mysqli_real_escape_string($conn,$_POST['description']);
       $category = mysqli_real_escape_string($conn,$_POST['category']);
       session_start();
       $author = $_SESSION['userId'];
        $sql = "insert into post(title,description,category,author,post_img)
                values('$title','$description',$category,$author,'$file_name');";
                $sql.= "UPDATE category SET post = post+1 where category_id = '$category'";
                if(mysqli_multi_query($conn,$sql)){
                            header('location:'.$hosting.'/post.php');
                    }else{
                            die('query cant not fire');
                        }                   
                }
                ?>