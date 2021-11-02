<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/admin_home.css">
</head>
<body>
    <?php
        include 'header.php';
    ?>
<div class="container">
<div id="title">
    <h1>Categories</h1>
    <a href="add_category.php">Add Category</a>
</div>
</div>
    <div class="container" id="table">
    <?php
        include 'conn.php';
        $sql = "select *from category";
        $result = mysqli_query($conn,$sql) or die('Query Error');
        if(mysqli_num_rows($result) > 0){
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>CATEGORY NAME</th>
                <th>NO.OF POST</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($res = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?php echo $res['category_id']?></td>
                <td><?php echo $res['category_name']?></td>
                <td><?php echo $res['post']?></td>
                <td><a href=""><i class="fa fa-pencil-square-o"></i></a></td>  
                <td><a href="delete.php"><i class="fa fa-trash"></i></a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
        }
    ?>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>