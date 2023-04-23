
<?php
require('db.php');

// Check if the form has been submitted
if (isset($_POST['submit'])){

    // Get the values from the form
    $statistics_ID = $_POST['statistics_ID'];
    $statisticsValue = $_POST['statisticsValue'];

    // Build the SQL query
    $sql = "UPDATE `Statistics`
            SET statisticsValue='$statisticsValue'
            WHERE statistics_ID=$statistics_ID";

    // Run the query and check for errors
    if (mysqli_query($conn, $sql)) {
        echo "<center><h3>Record updated successfully!</h3></center>";
        header('location:Statistics.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

// Check if the statistics ID has been set
if (isset($_POST['statistics_ID'])) {

    // Get the statistics record from the database
    $statistics_ID = $_POST['statistics_ID'];
    $sql = "SELECT * FROM `Statistics` WHERE `statistics_ID` = '$statistics_ID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Store the values in variables
    $statisticsValue = $row['statisticsValue'];
} else {
    // If statistics ID is not set, redirect to the statistics page
    header('location:Statistics.php');
    exit();
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
    <title>User Input Statistics</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <input type="hidden" name="statistics_ID" value="<?php echo $statistics_ID;?>">
        <div class="form-group">
            <label>statisticsValue</label>
            <input type="text" class="form-control" name="statisticsValue" placeholder="Enter the statisticsValue" autocomplete="off" value="<?php echo $statisticsValue;?>">
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
