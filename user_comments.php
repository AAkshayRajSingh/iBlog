
    <?php
require('db.php');
if (isset($_POST['submit'])){
    $comment_content = $_POST['comment_content'];
    $blog_id = $_POST['Blog_ID'];
    $user_id = $_POST['user_id'];
    $date_published = date('Y-m-d');
    
    $stmt = $conn->prepare("INSERT INTO `Comments` (`Date_published`, `comment_content`, `Blog_ID`, `User_ID`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $date_published, $comment_content, $blog_id, $user_id);
    if ($stmt->execute()) {
        echo "<center><h3>New record created successfully!</h3></center>";
        header('location:Comments.php');
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
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
    <title>Comment on Posts</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label for="comment_content">comment_content</label>
            <input type="text" class="form-control" id="comment_content" name="comment_content" placeholder="Enter the comment_content" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="Blog_ID">Blog_ID</label>
            <input type="text" class="form-control" id="Blog_ID" name="Blog_ID" placeholder="Enter the Blog_ID" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Enter the linked user ID" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fak
