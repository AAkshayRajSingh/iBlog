
<?php
// Include database connection and authentication files
require('db.php');
include("auth.php");
include("header.php");
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
    <title>Statistics</title>
  </head>
  <body>
  <div class="form-group float-right">
    <a href="dashboard.php" class="btn btn-primary">Dashboard</a>
</div>
    <div class="container my-5">
      <h1>Statistics</h1>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Statistics ID</th>
            <th>Statistics Value</th>
            <th>Date Recorded</th>
            <th>Statistics Type</th>
            <th>User ID</th>
            <th>Blog ID</th>
            <th>Action</th>

           
          </tr>
        </thead>
        <tbody>
        <?php
        // Query to retrieve statistics data from the database
        $sql = "SELECT * FROM `Statistics` ";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if any data is returned
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row of data and display it in the table
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["statistics_ID"] . "</td>";
                echo "<td>" . $row["statisticsValue"] . "</td>";
                echo "<td>" . $row["DateRecorded"] . "</td>";
                echo "<td>" . $row["statistics_type"] . "</td>";
                echo "<td>" . $row["User_ID"] . "</td>";
                echo "<td>" . $row["Blog_ID"] . "</td>";
                echo "<td>
          <form method='POST' action='update_statistics.php'>
          <input type='hidden' name='statistics_ID' value='" . $row['statistics_ID'] . "'>
          <button type='submit' class='btn btn-primary'>Update</button>
        </form>
      </td>";

              
                echo "</tr>";
            }
        } else {
            // Display message if no data is returned
            echo "<tr><td colspan='6'>No statistics data available.</td></tr>";
        }
        ?>
        </tbody>
      </table>
    </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQ...
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" >

</script>