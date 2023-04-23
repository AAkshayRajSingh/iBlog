<?php
session_start();
require('db.php');

if (!isset($_SESSION['admin_Id'])) {
    header("Location: admin.php");
}

if (isset($_GET['deleteid'])) {
    $user_id = $_GET['deleteid'];
    $sql = "DELETE FROM User WHERE User_ID = $user_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: user_table.php");
    } else {
        die("Error deleting user: " . mysqli_error($conn));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Table</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffffcc;
        }
    </style>
</head>
<body>
	<div class="container">
		<h1>User Table</h1>
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>User ID</th>
					<th>Username</th>
					<th>Email</th>
					<th>Date of Joining</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM User";
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['User_ID'] . "</td>";
					echo "<td>" . $row['username'] . "</td>";
					echo "<td>" . $row['Email'] . "</td>";
					echo "<td>" . $row['D_O_J'] . "</td>";
					echo "<td><a href='user_table.php?deleteid=" . $row['User_ID'] . "' class='btn btn-danger'>Delete</a></td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
