<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" href="css/add_category.css">
</head>
<body>
<?php
     include 'header.html';
    ?>
 <div class="container">
    <div>
      <h1>Update Post</h1>
     </div> 
         <form action="" method="post" id="formCategory"  enctype="multipart/form-data">
             <div>
                 <label for="title">Title</label>
                 <input type="text" name="title" id="title" placeholder="Title">
             </div>
             <div>
                 <label for="description">Description</label>
                 <textarea id="textarea" name="w3review" rows="6" >
                 </textarea>
             </div>
             <div>
                 <label for="category">Category</label>
                <select name="category" id="categorySelect">
                    <option value="1">Selete Category</option>
                </select>
             </div>
             <div>
                 <input type="file" name="file" id="file" >
             </div>
             
             <input type="submit" name="add" id="btn" value="Add">
         </form>
</div>
</body>
</html>