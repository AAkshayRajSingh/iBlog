<?php
require('db.php');
$settings_Id = $_GET['updateid'];

// Retrieve the current values of the setting with the given ID
$sql = "SELECT * FROM `Settings` WHERE settings_Id=$settings_Id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Initialize the variables with the current values
$settings_value = $row['settings_value'];
$setting_changed_date = $row['setting_changed_date'];
$User_ID = $row['User_ID'];

if (isset($_POST['submit'])){
    $settings_Id = $_POST['settings_Id'];
    $settings_value = $_POST['settings_value'];
    $setting_changed_date = $_POST['setting_changed_date'];
    $User_ID = $_POST['User_ID'];

    $sql = "UPDATE `Settings`
            SET settings_value='$settings_value', setting_changed_date='$setting_changed_date', User_ID='$User_ID'
            WHERE settings_Id=$settings_Id";

     if (mysqli_query($conn, $sql)) {
        echo "<center><h3>Record updated successfully!</h3></center>";
        header('location:Settings.php');
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
    <title>User Input Settings</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label>Settings ID</label>
            <input type="text" class="form-control" name="settings_Id" placeholder="Enter the settings ID" autocomplete="off" value="<?php echo $settings_Id;?>">
        </div>
        <div class="form-group">
            <label>Settings Value</label>
            <input type="text" class="form-control" name="settings_value" placeholder="Enter the settings value" autocomplete="off" value="<?php echo $settings_value;?>">
        </div>
        <div class="form-group">
            <label>Setting Changed Date</label>
            <input type="date" class="form-control" name="setting_changed_date" placeholder="Enter the setting changed date" autocomplete="off" value="<?php echo $setting_changed_date;?>">
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