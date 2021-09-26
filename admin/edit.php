<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>edit</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/edit.css">
    </head>
    <body>
        <?php
        include 'header.php';
        ?>
   <div id="container">
       <div>
           <h1>Your Information</h1>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST" id= "form1">
            <div>
                <label for="email">email</label>
                <input type="email" name = "email" id = "email" placeholder = "E-Mail">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name = "password" id = "password" placeholder = "Password">
                <div onclick='password()'>
                <i class="fa fa-eye-slash"id="close"></i>
                <i class="fa fa-eye"id="open"></i>
                </div>
            </div>
        <input type="submit" value = "Log In" name = "check" id = "check">

        
    </form>
    <?php
        if(isset($_POST['check'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            include 'conn.php';
            $sql = "select *From user where email = '$email' && password = '$password'";
            $result = mysqli_query($conn,$sql) or die('query can not fire');
            if(mysqli_num_rows($result)==false){
                echo "<p id = 'invalid'> Invalid Email or Password </p>";
            }else{
                ?>    
              
              
 <form action="editupdate.php" method="POST" id= "form">
 <?php
              $email = $_POST['email'];
              include 'conn.php';
              $sql1 = "select *From user where email = '$email'";
              $result1 = mysqli_query($conn,$sql1) or die('Server Error');
              if(mysqli_num_rows($result1)>0){
                  while($row = mysqli_fetch_assoc($result1)){
 ?>
                
  <div>
        <input type="hidden" name="id" id="id" placeholder="id" value = "<?Php echo $row['user_id'];?>">
    </div>
  <div>
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" placeholder="First Name" value = "<?Php echo $row['first_name'];?>">
    </div>
    <div>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" placeholder="Last Name" value = "<?Php echo $row['last_name'];?>">
    </div>
    <div>
        <label for="userName">User Name</label>
        <input type="text" name="userName" id="userName" placeholder="User Name" value = "<?Php echo $row['user_name'];?>">
    </div>
    <div>
        <label for="email1">E-Mail</label>
        <input type="email" name="email1" id="email1" placeholder="E-Mail" value = "<?Php echo $row['email'];?>">
    </div>
    <div>
        <label for="password1">Password</label>
        <input type="password" name="password1" id="password1" placeholder="Password" value = "<?Php echo $row['password'];?>">
        <div onclick='passwordEyes()'>
                <i class="fa fa-eye-slash"id="close1"></i>
                <i class="fa fa-eye"id="open1"></i>
         </div>
    </div>

    <div>
        <label for="userRole">User Role</label>
        <select name="userRole" id="userRole" onclick="password()">
            <?php 
                if($row['user_role'] == 1){
                    echo "<option value='0'>Normal User</option>
                    <option value='1' selected>Admin User</option>";
                }else{
                    echo "<option value='0'selected>Normal User</option>
                          <option value='1'>Admin User</option>";
                }
            ?>
        </select>
    </div>
    <input type="submit" value="Register" name="register" id ="btn">
  </form>
   </div>

 <?php
                  }
   }
            }
        }
        ?>
        <script src="js/jquery.js"></script>
        <script src="js/edit.js"></script>
</body>
</html>