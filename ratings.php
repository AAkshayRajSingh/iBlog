
<?php
	require('db.php');
	
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ratings</title>
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
      <button class="btn btn-primary my-5"><a href="user_rating.php"
       class="text-light">Add Ratings</a>
    </button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">rating_id</th>
      <th scope="col">dateRated</th>
      <th scope="col">ratingValue</th>
      <th scope="col">Blog_ID</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      
      <?php
      $sql = "SELECT * FROM `Rating`;";
      $result=mysqli_query($conn,$sql);
      if($result){
          while($row=mysqli_fetch_assoc($result)){
          $rating_ID=$row['rating_id']; 
          $dateRated=$row['dateRated'];
          $ratingValue=$row['ratingValue'];
          $Blog_ID=$row['Blog_ID'];
          $Actions=$row['Actions'];
          echo ' <tr>
          <th scope="row">'.$rating_ID.'</th>
          <td>'.$dateRated.'</td>
          <td>'.$ratingValue.'</td>
          <td>'.$Blog_ID.'</td>
          <td>'.$Actions.'</td>
        
      <td> 
    <div class="btn-group">
        <button class="btn btn-primary mr-2"><a href="update_rating.php?updateid='.$rating_ID.'" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="delete_rating.php?deleteid='.$rating_ID.'" class="text-light">Delete</a></button>
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
