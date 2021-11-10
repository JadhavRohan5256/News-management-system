<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="css/add_category.css">
    
</head>
<body>
    <?php
     include 'header.php';
    ?>
 <div class="container">
    <div id="container">
            <div>
             <h1>Add Category</h1>
            </div> 
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <div>
                 
                    <label for="categoryName">Category Name</label>
                    <input type="text" name="categoryName" id="categoryName" placeholder="Category Name">
                </div>
                <input type="submit" name="add" id="btn" value="Add">
            </form>
    </div>
</div>
        <?php
    if(isset($_POST['add'])){
        include 'conn.php';
        $categoryName = $_POST['categoryName'];
        $sql = "insert into category(category_name)
        values('$categoryName')";
        $result = mysqli_query($conn,$sql) or die("query error");
        if($result){
                    header('location:'.$hosting.'/category.php');
                }
    }
?>
<?php include 'footer.php'; ?>
</body>
</html>