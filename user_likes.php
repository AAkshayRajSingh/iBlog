<?php
require('db.php');

if (isset($_POST['submit'])){
    $like_ID = $_POST['like_ID'];
    $liked_date = date('Y-m-d');
    $Blog_ID = $_POST['Blog_ID'];
    $User_ID = $_POST['User_ID'];

    $sql = "INSERT INTO `Like` (like_ID, liked_date, Blog_ID, User_ID)
            VALUES ('$like_ID', '$liked_date', '$Blog_ID', '$User_ID')";

    if (mysqli_query($conn, $sql)) {
        echo "<center><h3>New record created successfully!</h3></center>";
        header('location: like.php');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffffcc;
        }
    </style>
    <title>Create New Like</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label for="like_ID">Like ID</label>
            <input type="number" class="form-control" id="like_ID" name="like_ID" placeholder="Enter like ID" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="Blog_ID">Blog ID</label>
            <input type="number" class="form-control" id="Blog_ID" name="Blog_ID" placeholder="Enter blog ID" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="User_ID">User ID</label>
            <input type="number" class="form-control" id="User_ID" name="User_ID" placeholder="Enter user ID" autocomplete="off" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Create Like</button>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fak
