
<?php
	require('db.php');
	
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogposts</title>
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
      <button class="btn btn-primary my-5"><a href="user_blogposts.php"
       class="text-light">Add Blogposts</a>
    </button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Blog_ID</th>
      <th scope="col">title</th>
      <th scope="col">Published_date</th>
      <th scope="col">content</th>
      <th scope="col">User_ID</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      
      <?php
      $sql = "SELECT * FROM `Blog_posts`;";
      $result=mysqli_query($conn,$sql);
      if($result){
          while($row=mysqli_fetch_assoc($result)){
          $Blog_ID=$row['Blog_ID']; 
          $title=$row['title'];
          $Published_date=$row['Published_date'];
          $content=$row['content'];
          $Actions=$row['Actions'];
          $User_ID=$row['User_ID'];
          echo ' <tr>
          <th scope="row">'.$Blog_ID.'</th>
          <td>'.$title.'</td>
          <td>'.$Published_date.'</td>
          <td>'.$content.'</td>
          <td>'.$User_ID.'</td>
          <td>'.$Actions.'</td>
        
      <td> 
    <div class="btn-group">
        <button class="btn btn-primary mr-2"><a href="update_posts.php?updateid='.$Blog_ID.'" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="delete_posts.php?deleteid='.$Blog_ID.'" class="text-light">Delete</a></button>
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
