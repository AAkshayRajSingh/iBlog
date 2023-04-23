
<?php
require('db.php');
$activity_ID = $_GET['updateid'];

// Retrieve the current values of the blog post with the given ID
$sql = "SELECT * FROM `Activitylog` WHERE activity_ID=$activity_ID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Initialize the variables with the current values
$activity_type = $row['activity_type'];
$activity_date = $row['activity_date'];
$User_ID = $row['User_ID'];

if (isset($_POST['submit'])){
    $activity_ID = $_POST['activity_ID'];
    $activity_type = $_POST['activity_type'];
    $activity_date = date('Y-m-d');
    $User_ID = $_POST['User_ID'];

    $sql = "UPDATE `Activitylog`
            SET activity_type='$activity_type',activity_date='$activity_date',  User_ID='$User_ID'
            WHERE activity_ID=$activity_ID";

     if (mysqli_query($conn, $sql)) {
        echo "<center><h3>Record updated successfully!</h3></center>";
        header('location:Activitylog.php');
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
    <title>User Input Activities</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label>activity_ID</label>
            <input type="text" class="form-control" name="activity_ID" placeholder="Enter the activity_ID" autocomplete="off" value="<?php echo $activity_ID;?>">
        </div>
        <div class="form-group">
            <label>activity_type</label>
            <input type="text" class="form-control" name="activity_type" placeholder="Enter the activity_type" autocomplete="off" value="<?php echo $activity_type;?>">
        </div>
        <div class="form-group">
            <label>activity_date</label>
            <input type="text" class="form-control" name="activity_date" placeholder="Enter the activity_date" autocomplete="off" value="<?php echo $activity_date;?>">
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


