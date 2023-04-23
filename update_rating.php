

<?php
require('db.php');

// Check if updateid is set in the URL
if(isset($_GET['updateid'])){
    $rating_ID = $_GET['updateid'];

    // Retrieve the current values of the blog post with the given ID
    $sql = "SELECT * FROM `Rating` WHERE rating_ID=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $rating_ID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    // Initialize the variables with the current values
    $dateRated = $row['dateRated'];
    $ratingValue = $row['ratingValue'];
    $Blog_ID = $row['Blog_ID'];

    mysqli_stmt_close($stmt);
}

if (isset($_POST['submit'])){
    $rating_ID = $_POST['rating_ID'];
    $dateRated = date('Y-m-d');
    $ratingValue = $_POST['ratingValue'];
    $Blog_ID = $_POST['Blog_ID'];

    // Validate user input
    $ratingValue = filter_var($ratingValue, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1, "max_range"=>5)));
    $Blog_ID = filter_var($Blog_ID, FILTER_VALIDATE_INT);

    if ($ratingValue && $Blog_ID) {
        $sql = "UPDATE `Rating`
                SET dateRated=?, ratingValue=?, Blog_ID=?
                WHERE rating_ID=?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "siii", $dateRated, $ratingValue, $Blog_ID, $rating_ID);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "<center><h3>Record updated successfully!</h3></center>";
            header('location:ratings.php');
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Invalid input.";
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
    <title>User Input Activities</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label>rating_ID</label>
            <input type="text" class="form-control" name="rating_ID" placeholder="Enter the rating_ID" autocomplete="off" value="<?php echo $rating_ID;?>">
        </div>
        <div class="form-group">
            <label>dateRated</label>
            <input type="text" class="form-control" name="dateRated" placeholder="Enter the dateRated" autocomplete="off" value="<?php echo $dateRated;?>">
        </div>
        <div class="form-group">
            <label>ratingValue</label>
            <input type="text" class="form-control" name="ratingValue" placeholder="Enter the ratingValue" autocomplete="off" value="<?php echo $ratingValue;?>">
        </div>
        <div class="form-group">
            <label>Blog_ID</label>
            <input type="text" class="form-control" name="Blog_ID" placeholder="Enter the linked Blog_ID" autocomplete="off" value="<?php echo $Blog_ID;?>">
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