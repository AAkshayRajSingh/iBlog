
<?php
	require('db.php');
	
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Views</title>
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
      <button class="btn btn-primary my-5"><a 
       class="text-light">Views</a>
    </button>
    <table class="table">
  <thead>
    <tr>
    <th scope="col">view_ID</th>
      <th scope="col">view_Count</th>
      <th scope="col">view_Date</th>
      <th scope="col">Blog_ID</th>   
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      
      <?php
      $sql = "SELECT * FROM `Views`;";
      $result=mysqli_query($conn,$sql);
      if($result){
          while($row=mysqli_fetch_assoc($result)){
          $view_ID=$row['view_ID']; 
          $view_Count=$row['view_Count'];
          $view_Date=$row['view_Date'];
          $Blog_ID=$row['Blog_ID'];
          $Actions=$row['Actions'];
          
          echo ' <tr>
          <th scope="row">'.$view_ID.'</th>
          <td>'.$view_Count.'</td>
          <td>'.$view_Date.'</td>
          <td>'.$Blog_ID.'</td>
          <td>'.$Actions.'</td>
        
      <td> 
    <div class="btn-group">
        <button class="btn btn-primary mr-2"><a href="update_views.php?updateid='.$Blog_ID.'" class="text-light">Update</a></button>
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
