
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
       class="text-light">Activities</a>
    </button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">activity_ID</th>
      <th scope="col">activity_type</th>
      <th scope="col">activity_date</th>
      <th scope="col">User_ID</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      
      <?php
      $sql = "SELECT * FROM `Activitylog`;";
      $result=mysqli_query($conn,$sql);
      if($result){
          while($row=mysqli_fetch_assoc($result)){
          $activity_ID=$row['activity_ID']; 
          $activity_type=$row['activity_type'];
          $activity_date=$row['activity_date'];
          $User_ID=$row['User_ID'];
          $Actions=$row['Actions'];
          echo ' <tr>
          <th scope="row">'.$activity_ID.'</th>
          <td>'.$activity_type.'</td>
          <td>'.$activity_date.'</td>
          <td>'.$User_ID.'</td>
          <td>'.$Actions.'</td>
        
      <td> 
    <div class="btn-group">
        <button class="btn btn-primary mr-2"><a href="update_activity.php?updateid='.$activity_ID.'" class="text-light">Update</a></button>
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
