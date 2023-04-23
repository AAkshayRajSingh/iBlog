<?php
	require('db.php');
	
	if (isset($_POST['category_id'])) {
		$category_id = $_POST['category_id'];
		$sql = "SELECT Blog_posts.title, Blog_posts.Published_date, Blog_posts.content, Category.category_type
				FROM Blog_posts
				INNER JOIN Category ON Blog_posts.Category_ID = Category.Category_ID
				WHERE Category.Category_ID = $category_id;";
	} else {
		$sql = "SELECT Blog_posts.title, Blog_posts.Published_date, Blog_posts.content, Category.category_type
				FROM Blog_posts
				INNER JOIN Category ON Blog_posts.Category_ID = Category.Category_ID;";
	}
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
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
	<h1>Blog Posts</h1>
	<form method="post">
		<div class="form-group">
			<label for="category_id">Category ID:</label>
			<input type="text" name="category_id" id="category_id" class="form-control" value="<?php echo isset($category_id) ? $category_id : ''; ?>">
		</div>
		<button type="submit" class="btn btn-primary mb-3">Filter</button>
	</form>
    <table class="table">
	  <thead>
		<tr>
		  <th scope="col">Title</th>
		  <th scope="col">Published Date</th>
		  <th scope="col">Content</th>
		  <th scope="col">Category</th>
		</tr>
	  </thead>
	  <tbody>
		  
		  <?php
		  $result=mysqli_query($conn,$sql);
		  if($result){
			  while($row=mysqli_fetch_assoc($result)){
			  $title=$row['title']; 
			  $published_date=$row['Published_date'];
			  $content=$row['content'];
			  $category_type=$row['category_type'];
			  echo ' <tr>
			  <td>'.$title.'</td>
			  <td>'.$published_date.'</td>
			  <td>'.$content.'</td>
			  <td>'.$category_type.'</td>
			  </tr>';
			  }
		  }
		  ?>
		
	  </tbody>
	</table>
</div>
</body>
</html>
