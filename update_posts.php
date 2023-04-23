
<?php
require('db.php');
$Blog_ID = $_GET['updateid'];

// Retrieve the current values of the blog post with the given ID
$sql = "SELECT * FROM `Blog_posts` WHERE Blog_ID=$Blog_ID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Initialize the variables with the current values
$title = $row['title'];
$content = $row['content'];
$User_ID = $row['User_ID'];

if (isset($_POST['submit'])){
    $Blog_ID = $_POST['Blog_ID'];
    $title = $_POST['title'];
    $Published_date = date('Y-m-d');
    $content = $_POST['content'];
    $User_ID = $_POST['User_ID'];

    $sql = "UPDATE `Blog_posts`
            SET title='$title', Published_date='$Published_date', content='$content', User_ID='$User_ID'
            WHERE Blog_ID=$Blog_ID";

     if (mysqli_query($conn, $sql)) {
        echo "<center><h3>Record updated successfully!</h3></center>";
        header('location:Blogposts.php');
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
    <title>User Input Posts</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label>Blog_ID</label>
            <input type="text" class="form-control" name="Blog_ID" placeholder="Enter the Blog_ID" autocomplete="off" value="<?php echo $Blog_ID;?>">
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" placeholder="Enter the title" autocomplete="off" value="<?php echo $title;?>">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" name="content" placeholder="Enter the content" autocomplete="off"><?php echo $content;?></textarea>
        </div>
        <div class="form-group">
            <label>User ID</label>
            <input type="text" class="form-control" name="User_ID" placeholder="Enter the linked user ID" autocomplete="off" value="<?php echo $User_ID;?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update Record</button>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
</body>
</html>


