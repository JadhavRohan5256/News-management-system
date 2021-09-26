<?php
   include 'conn.php';
  echo  $id= $_GET['id'];
  echo  $post_id= $_GET['postId'];
   $sqli1 = "select *from post where post_id =$id";
   $result = mysqli_query($conn,$sqli1) or die("select query can not fire");
   while($row = mysqli_fetch_assoc($result)){

      unlink('uploaded/'.$row['post_img']);
   }
   $sql ="DELETE FROM post WHERE post_id = {$id};";
   $sql.="UPDATE category SET post = post-1 where category_id= {$post_id}";
   if(mysqli_multi_query($conn,$sql)){
      mysqli_close($conn);
      header('location:'.$hosting.'/add_post.php');
   }else{
      die('Query can not fire');
   }
?>