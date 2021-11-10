<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/add_user.css">
</head>
<body>
    
<div id="container">
<div>
    <h1>Register</h1>
</div> 
<div id="form">
<form action="add_user1.php" method="POST">
    <div>
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" placeholder="First Name">
    </div>
    <div>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" placeholder="Last Name">
    </div>
    <div>
        <label for="userName">User Name</label>
        <input type="text" name="userName" id="userName" placeholder="User Name">
    </div>
    <div>
        <label for="email">E-Mail</label>
        <input type="email" name="email" id="email" placeholder="E-Mail">
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
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">
       <div onclick="eyes()">
       <i class="fa fa-eye-slash"id="conclose"></i>
        <i class="fa fa-eye"id="conopen"></i>
       </div>
    </div>
    <div>
        //  <label for="userRole">User Role</label>
        <select name="userRole" id="userRole" onclick="password()">
            <option value="0">Normal User</option>
            <option value="1" hidden>Admin User</option>
        </select>
    </div>
    <input type="submit" value="Register" name="register" id ="btn">
</form>  
</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/add_user.js"></script>
</body>
</html>