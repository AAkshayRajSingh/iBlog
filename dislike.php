<?php
    require('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dislikes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
   <button class="btn btn-primary my-5"><a href="user_dislikes.php"
       class="text-light">Dislike Post</a>
    </button>
      <table class="table">
         <thead>
            <tr>
              <th scope="col">Dislike ID</th>
              <th scope="col">Date</th>
              <th scope="col">Reason</th>
              <th scope="col">Blog ID</th>
              <th scope="col">User ID</th>
              <th scope="col">Actions</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $sql = "SELECT * FROM `Dislike`;";
               $result = mysqli_query($conn, $sql);
               if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                     $dislike_ID = $row['dislike_ID']; 
                     $dislike_date = $row['dislike_date'];
                     $reason = $row['Reason'];
                     $blog_ID = $row['Blog_ID'];
                     $user_ID = $row['User_ID'];
                     echo '<tr>
                           <th scope="row">'.$dislike_ID.'</th>
                           <td>'.$dislike_date.'</td>
                           <td>'.$reason.'</td>
                           <td>'.$blog_ID.'</td>
                           <td>'.$user_ID.'</td>
                           <td>
                              <div class="btn-group">
                                 <button class="btn btn-danger"><a href="delete_dislike.php?dislike_ID='.$dislike_ID.'" class="text-light">Delete</a></button>
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
