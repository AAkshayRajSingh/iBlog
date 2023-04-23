<?php
require('db.php');
if (isset($_POST['submit'])){
    $message_ID=$_POST['message_ID'];
    $message_dt = date('Y-m-d');
    $message_data = $_POST['message_data'];
    $sender_userID = $_POST['sender_userID'];
    $recipient_userID = $_POST['recipient_userID'];

    $sql = "INSERT INTO Messages (message_dt, message_data, sender_userID, recipient_userID)
            VALUES ('$message_dt', '$message_data', '$sender_userID', '$recipient_userID')";

    if (mysqli_query($conn, $sql)) {
        echo "<center><h3>New record created successfully!</h3></center>";
        header('location: messages.php');
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
    <title>Compose Message</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label for="message_data">Message</label>
            <textarea class="form-control" id="message_data" name="message_data" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="sender_userID">Sender ID</label>
            <input type="text" class="form-control" id="sender_userID" name="sender_userID" placeholder="Enter your user ID" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="recipient_userID">Recipient ID</label>
            <input type="text" class="form-control" id="recipient_userID" name="recipient_userID" placeholder="Enter the recipient user ID" autocomplete="off" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Send</button>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fak
