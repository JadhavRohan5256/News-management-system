<?php 
 include 'conn.php';
 session_start();
  if(isset($_SESSION['userName'])){
   header('location:'.$hosting.'/post.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
    <style>
       div h1{
            margin-top:5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            
            <h1>Log In</h1>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div>
                <label for="userName">User Name</label>
                <input type="text" name="userName" id="userName" placeholder="User Name" autocomplete="off">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
                <div onclick='passwordEyes()'>
                   <i class="fa fa-eye-slash"id="close"></i>
                   <i class="fa fa-eye"id="open"></i>
                 </div>
            </div>
            <div>
                <input type="submit" name="logIn" id="btn" value="Log In">
            </div>
            <div id="divide">
                <span></span>
                <span>Or</span>
                <span></span>
            </div>
            <div>
                <a href="add_user.php" id="signUp">
                <i class="fa fa-sign-in"></i>
                    Sign Up
                </a>
                <a href="forgate.php" id="forgate">Forgotten Password?</a>
            </div>
        </form>
        <?php 
          
        //   Fetching the data in database and store data in session 
        
            if(isset($_POST['logIn'])){
               if(!empty($_POST['userName']) && !empty($_POST['password'])){
                include 'conn.php';
                $userName =mysqli_real_escape_string($conn, $_POST['userName']);
                 $password = addslashes($_POST['password']);
                $sql = "select user_id,user_name,user_role,first_name,last_name from user where user_name = '{$userName}' && password = '{$password}'";
                $result = mysqli_query($conn,$sql) or die("Query Filled");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        session_start();
                          $_SESSION['userId'] = $row['user_id'];
                          $_SESSION['userName'] = $row['user_name'];
                          $_SESSION['userRole'] = $row['user_role'];
                          $_SESSION['firstName'] = $row['first_name'];
                          $_SESSION['lastName'] = $row['last_name'];
                        header('location:'.$hosting.'/post.php');
                    }
                }else{
                   echo  '<p class="warning"> UserName and Password Not Valid Please Enter Valid UserName and Password';
                }
               }
            }
        ?>
    </div>
    <script>
        function passwordEyes(){
    let open = document.getElementById('open');
    let close = document.getElementById('close');
    let password = document.getElementById('password');
    if(password.type == 'password'){
        password.type ='text';
        open.style.display = 'block';
        close.style.display= 'none';
    }else{
        password.type ='password';
        open.style.display = 'none';
        close.style.display= 'block';
    }
}
    </script>
</body>
</html>