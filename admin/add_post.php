<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" href="css/fetch_post_details.css">
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <div id="container">
        <div>
        <h1>Add Post</h1>
        </div> 
        <form action="postUpload.php" method="post" id="formCategory"  enctype="multipart/form-data">
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Title">
            </div>
            <div>
                <label for="description">Description</label>
                <textarea id="textarea" name="description" rows="6" >
                </textarea>
            </div>
            <div>
                <label for="category">Category</label>
            <select name="category" id="categorySelect">
                <option disabled>Selete Category</option>
                <?php
                    include 'conn.php';
                    $sql = "select *from category";
                    $result = mysqli_query($conn,$sql) or die("Query Error");
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<option value='{$row['category_id']}'>".$row['category_name']."</option>";
                        }
                    }
                ?>
            </select>
            </div>
            <div>
                <input type="file" name="file" id="file" >
            </div>
            
            <input type="submit" name="add" id="btn" value="Add">
        </form>
    </div>
<?php include 'footer.php' ?>
</body>
</html>