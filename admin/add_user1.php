 <?php   
 
        // Connection to database 
        include 'conn.php';
        if($_POST['password'] == $_POST['confirmPassword']){
             $password =mysqli_real_escape_string($conn,$_POST['password']);
        }else{
             echo "<h1 style='color:#ff0000;text-align:center;'>your Password and Confirm Password are wrong?<p>";
             die();
        }
        $firstName =mysqli_real_escape_string($conn,$_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn,$_POST['lastName']);
        $userName = mysqli_real_escape_string($conn,$_POST['userName']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $userRole = mysqli_real_escape_string($conn,$_POST['userRole']);
        $sql1 = "select * from user where user_name = '$userName'";
        $result1 = mysqli_query($conn,$sql1) or die('error');
        if(mysqli_num_rows($result1)>0){
             echo "<b style= 'color:#ff0000;text-align:center;'> User name exist Please choose anather user name </b>";
        }else{
        $sql = "insert into user(first_name,last_name,user_name,email,password,user_role) values('$firstName','$lastName','$userName','$email','$password',$userRole)";
        $result = mysqli_query($conn,$sql) or die("Query can not fire");
        mysqli_close($conn);
        header('location:'.$hosting.'/post.php');
        }
?>