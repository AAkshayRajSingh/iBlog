<?php
require('db.php');

if (isset($_POST['submit'])){
    $userRole_ID = $_POST['userRole_ID'];
    $rolename = $_POST['rolename'];
    $Role_Description = $_POST['Role_Description'];
    $Role_created_Date = date('Y-m-d');

    $sql = "INSERT INTO Userrole (userRole_ID, rolename, Role_Description, Role_created_Date)
            VALUES ('$userRole_ID', '$rolename', '$Role_Description', '$Role_created_Date')";

    if (mysqli_query($conn, $sql)) {
        echo "<center><h3>New record created successfully!</h3></center>";
        header('location: userroles.php');
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
    <title>Create New User Role</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label for="userRole_ID">User Role ID</label>
            <input type="number" class="form-control" id="userRole_ID" name="userRole_ID" placeholder="Enter user role ID" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="rolename">Role Name</label>
            <input type="text" class="form-control" id="rolename" name="rolename" placeholder="Enter role name" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="Role_Description">Role Description</label>
            <textarea class="form-control" id="Role_Description" name="Role_Description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Create User Role</button>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fak
