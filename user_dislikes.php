<?php
require('db.php');

if (isset($_POST['submit'])){
    $dislike_ID = $_POST['dislike_ID'];
    $dislike_date = date('Y-m-d');
    $reason = $_POST['reason'];
    $blog_ID = $_POST['blog_ID'];
    $user_ID = $_POST['user_ID'];

    $sql = "INSERT INTO Dislike (dislike_ID, dislike_date, Reason, Blog_ID, User_ID)
            VALUES ('$dislike_ID', '$dislike_date', '$reason', '$blog_ID', '$user_ID')";

    if (mysqli_query($conn, $sql)) {
        echo "<center><h3>New record created successfully!</h3></center>";
        header('location: dislike.php');
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
    <title>Create New Dislike</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label for="dislike_ID">Dislike ID</label>
            <input type="number" class="form-control" id="dislike_ID" name="dislike_ID" placeholder="Enter dislike ID" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="reason">Reason</label>
            <input type="text" class="form-control" id="reason" name="reason" placeholder="Enter reason" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="blog_ID">Blog ID</label>
            <input type="number" class="form-control" id="blog_ID" name="blog_ID" placeholder="Enter blog ID" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="user_ID">User ID</label>
            <input type="number" class="form-control" id="user_ID" name="user_ID" placeholder="Enter user ID" autocomplete="off" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Create Dislike</button>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fak
