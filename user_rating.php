<?php
require('db.php');

if (isset($_POST['submit'])) {
    $dateRated = $_POST['dateRated'];
    $ratingValue = $_POST['ratingValue'];
    $blog_id = $_POST['Blog_ID'];
    
    $stmt = $conn->prepare("INSERT INTO `Rating` (`dateRated`, `ratingValue`, `Blog_ID`) VALUES (?, ?, ?)");
    $stmt->bind_param("sdi", $dateRated, $ratingValue, $blog_id);
    
    if ($stmt->execute()) {
        echo "<center><h3>New record created successfully!</h3></center>";
        header('location: ratings.php');
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
    <title>Rate a Post</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label for="dateRated">Date Rated</label>
            <input type="date" class="form-control" id="dateRated" name="dateRated" placeholder="Enter the date rated" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="ratingValue">Rating Value</label>
            <input type="number" step="0.1" min="0" max="5" class="form-control" id="ratingValue" name="ratingValue" placeholder="Enter the rating value" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="Blog_ID">Blog_ID</label>
            <input type="text" class="form-control" id="Blog_ID" name="Blog_ID" placeholder="Enter the Blog_ID" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakhtXc4yJ2Jzy1dWf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
</body>
</html>
