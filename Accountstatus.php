
<?php
	require('db.php');
	
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ActivityLog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <style>
        body {
            background-color: #ffffcc;
        }
    </style>    
</head>
<body>
<div class="form-group float-right">
    <a href="dashboard.php" class="btn btn-primary">Dashboard</a>
</div>
<div class="container">
      <button class="btn btn-primary my-5"><a href=""
       class="text-light">Accountstatus</a>
    </button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">accountStatus_ID</th>
      <th scope="col">statusDescription</th>
      <th scope="col">dateChanged</th>
      <th scope="col">user_ID</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      
      <?php
      $sql = "SELECT * FROM `Accountstatus`;";
      $result=mysqli_query($conn,$sql);
      if($result){
          while($row=mysqli_fetch_assoc($result)){
          $accountStatus_ID=$row['accountStatus_ID']; 
          $statusDescription=$row['statusDescription'];
          $dateChanged=$row['dateChanged'];
          $user_ID=$row['user_ID'];
          $Actions=$row['Actions'];
          echo ' <tr>
          <th scope="row">'.$accountStatus_ID.'</th>
          <td>'.$statusDescription.'</td>
          <td>'.$dateChanged.'</td>
          <td>'.$user_ID.'</td>
          <td>'.$Actions.'</td>
        
      <td> 
    <div class="btn-group">
        <button class="btn btn-primary mr-2"><a href="update_Accountstatus.php?updateid='.$accountStatus_ID.'" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="delete_Accountstatus.php?deleteid='.$accountStatus_ID.'" class="text-light">Delete</a></button>
    </div>
</td>

        </tr>';
          }
      }
      ?>
    
  </tbody>

</table>
   </div>
</body>
</html>
