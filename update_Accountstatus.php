
<?php
require('db.php');
$accountStatus_ID = $_GET['updateid'];

// Retrieve the current values of the account status with the given ID
$sql = "SELECT * FROM `Accountstatus` WHERE accountStatus_ID=$accountStatus_ID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Initialize the variables with the current values
$statusDescription = $row['statusDescription'];
$dateChanged = $row['dateChanged'];
$user_id = $row['user_id'];

if (isset($_POST['submit'])){
    $accountStatus_ID = $_POST['accountStatus_ID'];
    $statusDescription = $_POST['statusDescription'];
    $dateChanged = date('Y-m-d');
    $user_id = $_POST['user_id'];

    $sql = "UPDATE `Accountstatus`
            SET statusDescription='$statusDescription', dateChanged='$dateChanged', user_id='$user_id'
            WHERE accountStatus_ID=$accountStatus_ID";

     if (mysqli_query($conn, $sql)) {
        echo "<center><h3>Record updated successfully!</h3></center>";
        header('location:Accountstatus.php');
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
    <title>Update Account Status</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label>Account Status ID</label>
            <input type="text" class="form-control" name="accountStatus_ID" placeholder="Enter the accountStatus_ID" autocomplete="off" value="<?php echo $accountStatus_ID;?>">
        </div>
        <div class="form-group">
            <label>Status Description</label>
            <input type="text" class="form-control" name="statusDescription" placeholder="Enter the statusDescription" autocomplete="off" value="<?php echo $statusDescription;?>">
        </div>
        <div class="form-group">
            <label>Date Changed</label>
            <input type="text" class="form-control" name="dateChanged" placeholder="Enter the dateChanged" autocomplete="off" value="<?php echo $dateChanged;?>">
        </div>
        <div class="form-group">
            <label>User ID</label>
            <input type="text" class="form-control" name="user_id" placeholder="Enter the linked user ID" autocomplete="off" value="<?php echo $user_id;?>">
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
