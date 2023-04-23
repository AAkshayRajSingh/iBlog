<?php
  require('db.php');
  if (isset($_POST['submit'])){
    $Blog_ID=$_POST['Blog_ID'];
    $title=$_POST['title'];
    $Published_date=date('Y-m-d');
    $content=$_POST['content'];
    $User_ID=$_POST['user_id'];
       

    $sql = "INSERT INTO `Blog_posts` (
        Blog_ID,
        title,
        Published_date,
        content,
        User_ID
    )
    VALUES (
        '$Blog_ID',
        '$title',
        '$Published_date',
        '$content',
        '$User_ID'
    )";
        
    if (mysqli_query($conn, $sql)) {
      echo "<center><h3>New record created successfully!</h3></center>";
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
    <title>User input Posts</title>
  </head>
  <body>
    <div class="container my-5"> 
      <form method="post">
        <div class="form-group">
          <label for="Blog_ID">Blog ID</label>
          <input type="text" class="form-control" id="Blog_ID" name="Blog_ID" placeholder="Enter the Blog ID" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Enter the title" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="content">Content</label>
          <input type="text" class="form-control" id="content" name="content" placeholder="Enter the content" autocomplete="off">
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
