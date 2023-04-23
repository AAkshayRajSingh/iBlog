<?php
require('db.php');
$message_ID = $_GET['updateid'];

// Retrieve the current values of the blog post with the given ID
$sql = "SELECT * FROM `Messages` WHERE message_ID=$message_ID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Initialize the variables with the current values
$message_ID = $row['message_ID']; 
$message_dt = $row['message_dt'];
$message_data = $row['message_data'];
$sender_userID = $row['sender_userID'];
$recipient_userID = $row['recipient_userID'];

if (isset($_POST['submit'])){
    $message_ID=$_POST['message_ID'];
    $message_dt = date('Y-m-d');
    $message_data = $_POST['message_data'];
    $sender_userID = $_POST['sender_userID'];
    $recipient_userID = $_POST['recipient_userID'];

    $sql = "UPDATE `Messages`
            SET message_data='$message_data', message_dt='$message_dt', sender_userID='$sender_userID' ,recipient_userID='$recipient_userID'
            WHERE message_ID=$message_ID";

     if (mysqli_query($conn, $sql)) {
        echo "<center><h3>Record updated successfully!</h3></center>";
        header('location:messages.php');
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
    <title>Messages</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label>message_ID</label>
            <input type="text" class="form-control" name="message_ID" placeholder="Enter the message_ID" autocomplete="off" value="<?php echo $message_ID;?>">
        </div>
        <div class="form-group">
            <label>message_dt</label>
            <input type="text" class="form-control" name="message_dt" placeholder="Enter the message_dt" autocomplete="off" value="<?php echo $message_dt;?>">
        </div>
        <div class="form-group">
            <label>message_data</label>
            <textarea class="form-control" name="message_data" placeholder="Enter the message_data" autocomplete="off"><?php echo $message_data;?></textarea>
        </div>
        <div class="form-group">
            <label>sender_userID</label>
            <input type="text" class="form-control" name="sender_userID" placeholder="Enter the linked sender_userID" autocomplete="off" value="<?php echo $sender_userID;?>">
        </div>
        <div class="form-group">
            <label>recipient_userID</label>
            <input type="text" class="form-control" name="recipient_userID" placeholder="Enter the linked recipient_userID" autocomplete="off" value="<?php echo $recipient_userID;?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Edit Message</button>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
</body>
</html>
