<?php
	require('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
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
      <button class="btn btn-primary my-5"><a href="compose_message.php" class="text-light">Compose Message</a></button>
      
      <table class="table">
         <thead>
            <tr>
              <th scope="col">Message ID</th>
              <th scope="col">Date</th>
              <th scope="col">Message</th>
              <th scope="col">Sender ID</th>
              <th scope="col">Recipient ID</th>
              <th scope="col">Actions</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $sql = "SELECT * FROM `Messages`;";
               $result = mysqli_query($conn, $sql);
               if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                     $message_ID = $row['message_ID']; 
                     $message_dt = $row['message_dt'];
                     $message_data = $row['message_data'];
                     $sender_userID = $row['sender_userID'];
                     $recipient_userID = $row['recipient_userID'];
                     echo '<tr>
                           <th scope="row">'.$message_ID.'</th>
                           <td>'.$message_dt.'</td>
                           <td>'.$message_data.'</td>
                           <td>'.$sender_userID.'</td>
                           <td>'.$recipient_userID.'</td>
                           <td>
                              <div class="btn-group">
                                 <button class="btn btn-primary mr-2"><a href="edit_message.php?updateid='.$message_ID.'" class="text-light">Edit</a></button>
                                 <button class="btn btn-danger"><a href="delete_message.php?deleteid='.$message_ID.'" class="text-light">Delete</a></button>
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
