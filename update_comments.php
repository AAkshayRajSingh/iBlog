<?php
require('db.php');
$Comment_ID = $_GET['updateid'];

// Retrieve the current values of the blog post with the given ID
$sql = "SELECT * FROM `Comments` WHERE Comment_ID=$Comment_ID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Initialize the variables with the current values
$comment_content = $row['comment_content'];
$Blog_ID = $row['Blog_ID'];
$User_ID = $row['User_ID'];
$Date_published = $row['Date_published'];

if (isset($_POST['submit'])){
    $Comment_ID = $_POST['Comment_ID'];
   $Date_published = $_POST['Date_published'];
    $comment_content = $_POST['comment_content'];
    $Blog_ID = $_POST['Blog_ID'];
    $User_ID = $_POST['User_ID'];

    $sql = "UPDATE `Comments`
            SET comment_content='$comment_content', Date_published='$Date_published', Blog_ID='$Blog_ID' ,User_ID='$User_ID'
            WHERE Comment_ID=$Comment_ID";

     if (mysqli_query($conn, $sql)) {
        echo "<center><h3>Record updated successfully!</h3></center>";
        header('location:Comments.php');
     } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     }

     mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    <style>
        body {
            background-color: #ffffcc;
        }
    </style>
    <title>Comments on Posts</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label>Comment_ID</label>
            <input type="text" class="form-control" name="Comment_ID" placeholder="Enter the Comment_ID" autocomplete="off" value="<?php echo $Comment_ID;?>">
        </div>
        <div class="form-group">
            <label>Date_published</label>
            <input type="text" class="form-control" name="Date_published" placeholder="Enter the Date_published" autocomplete="off" value="<?php echo $Date_published;?>">
        </div>
        <div class="form-group">
            <label>comment_content</label>
            <textarea class="form-control" name="comment_content" placeholder="Enter the content" autocomplete="off"><?php echo $comment_content;?></textarea>
        </div>
        <div class="form-group">
            <label>Blog_ID</label>
            <input type="text" class="form-control" name="Blog_ID" placeholder="Enter the linked Blog_ID" autocomplete="off" value="<?php echo $Blog_ID;?>">
        </div>
        <div class="form-group">
            <label>User ID</label>
            <input type="text" class="form-control" name="User_ID" placeholder="Enter the linked User_ID" autocomplete="off" value="<?php echo $User_ID;?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update comment</button>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
</body>
</html>
