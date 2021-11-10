<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/add_category.css">
</head>
<body>
<?php
     include 'header.php';
    ?>
 <div class="container">
    <div>
      <h1>Edit Category</h1>
     </div> 
         <form action="" method="post">
             <div>
                 <label for="categoryName">Category Name</label>
                 <input type="text" name="categoryName" id="categoryName" placeholder="Category Name">
             </div>
             <input type="submit" name="add" id="btn" value="Edit">
         </form>
</div>
</body>
</html>