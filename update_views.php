<?php
require('db.php');
$view_ID = $_GET['updateid'];

// Retrieve the current values of the view with the given ID
$sql = "SELECT * FROM `Views` WHERE view_ID=$view_ID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Initialize the variables with the current values
$view_Count = $row['view_Count'];
$view_Date = $row['view_Date'];
$Blog_ID = $row['Blog_ID'];

if (isset($_POST['submit'])){
    $view_ID = $_POST['view_ID'];
    $view_Count = $_POST['view_Count'];
    $view_Date = $_POST['view_Date'];
    $Blog_ID = $_POST['Blog_ID'];

    $sql = "UPDATE `Views`
            SET view_Count='$view_Count', view_Date='$view_Date', Blog_ID='$Blog_ID'
            WHERE view_ID=$view_ID";

     if (mysqli_query($conn, $sql)) {
        echo "<center><h3>Record updated successfully!</h3></center>";
        header('location:Views.php');
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
    <title>User Input Views</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label>View ID</label>
            <input type="text" class="form-control" name="view_ID" placeholder="Enter the view ID" autocomplete="off" value="<?php echo $view_ID;?>">
        </div>
        <div class="form-group">
            <label>View Count</label>
            <input type="text" class="form-control" name="view_Count" placeholder="Enter the view count" autocomplete="off" value="<?php echo $view_Count;?>">
        </div>
        <div class="form-group">
            <label>View Date</label>
            <input type="date" class="form-control" name="view_Date" placeholder="Enter the view date" autocomplete="off" value="<?php echo $view_Date;?>">
        </div>
        <div class="form-group">
            <label>Blog ID</label>
            <input type="text" class="form-control" name="Blog_ID" placeholder="Enter the linked blog ID" autocomplete="off" value="<?php echo $Blog_ID;?>">
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
