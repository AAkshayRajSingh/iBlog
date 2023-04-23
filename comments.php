<?php
	require('db.php');
	
	if (isset($_POST['Comment_ID'])) {
		$Comment_ID = $_POST['Comment_ID'];
		$sql = "SELECT Comments.Comment_ID, Blog_posts.title, Comments.comment_content, Comments.Date_published, Comments.Blog_ID, Comments.User_ID
				FROM Blog_posts
				INNER JOIN Comments ON Blog_posts.Blog_ID = Comments.Blog_ID
				WHERE Comments.Comment_ID = $Comment_ID";
	} else {
		$sql = "SELECT Comments.Comment_ID, Blog_posts.title, Comments.comment_content, Comments.Date_published, Comments.Blog_ID, Comments.User_ID
				FROM Blog_posts
				INNER JOIN Comments ON Blog_posts.Blog_ID = Comments.Blog_ID";
	}
	
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments on Posts</title>
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
  <div class="row">
    <div class="col-md-7"></div>
    <div class="col-md-10">
      <h2>Comments</h2>
     </div>
    <div class="col-md-10"></div>
  </div>
</div>

<div class="container">
      <button class="btn btn-primary my-5"><a href="user_comments.php"
       class="text-light">Add Comments</a>
    </button>
<div class="container">
	
	<form method="post">
		<div class="form-group">
			<label for="Comment_ID">Comment_ID:</label>
            <input type="text" name="Comment_ID" id="Comment_ID" class="form-control" value="<?php echo isset($Comment_ID) ? $Comment_ID : ''; ?>">	
        </div>
		<button type="submit" class="btn btn-primary mb-3">Filter</button>
	</form>
    <table class="table">
	  <thead>
		<tr>
		  <th scope="col">Comment_ID</th>
		  <th scope="col">Date_published</th>
		  <th scope="col">comment_content</th>
		  <th scope="col">Blog_ID</th>
          <th scope="col">User_ID</th>
          <th scope="col">Actions</th>
		</tr>
	  </thead>
	  <tbody>
		  
		  <?php
		  $result=mysqli_query($conn,$sql);
		  if($result){
			  while($row=mysqli_fetch_assoc($result)){
			  $Comment_ID=$row['Comment_ID'];
			  $Date_published=$row['Date_published'];
			  $comment_content=$row['comment_content'];
			  $Blog_ID=$row['Blog_ID'];
              $User_ID=$row['User_ID'];
              $Actions=$row['Actions'];
			  echo ' <tr>
			  <td>'.$Comment_ID.'</td>
			  <td>'.$Date_published.'</td>
			  <td>'.$comment_content.'</td>
              <td>'.$Blog_ID.'</td>
              <td>'.$User_ID.'</td>
              <td>'.$Actions.'</td>

              <td> 
              <div class="btn-group">
                  <button class="btn btn-primary mr-2"><a href="update_comments.php?updateid='.$Comment_ID.'" class="text-light">Update</a></button>
                  <button class="btn btn-danger"><a href="delete_comments.php?deleteid='.$Comment_ID.'" class="text-light">Delete</a></button>
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
