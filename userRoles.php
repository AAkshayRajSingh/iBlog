<?php
    require('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Roles</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffffcc;
        }
    </style>
   </head>
<body>
   <div class="container">
      <button class="btn btn-primary my-5"><a href="add_userrole.php" class="text-light">Add User Role</a></button>
      <table class="table">
         <thead>
            <tr>
              <th scope="col">User Role ID</th>
              <th scope="col">Role Name</th>
              <th scope="col">Role Description</th>
              <th scope="col">Role Created Date</th>
              
            </tr>
         </thead>
         <tbody>
            <?php
               $sql = "SELECT * FROM Userrole;";
               $result = mysqli_query($conn, $sql);
               if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                     $userRole_ID = $row['userRole_ID']; 
                     $rolename = $row['rolename'];
                     $Role_Description = $row['Role_Description'];
                     $Role_created_Date = $row['Role_created_Date'];
                     echo '<tr>
                           <th scope="row">'.$userRole_ID.'</th>
                           <td>'.$rolename.'</td>
                           <td>'.$Role_Description.'</td>
                           <td>'.$Role_created_Date.'</td>
                          
                          </tr>';
                  }
               }
            ?>
         </tbody>
      </table>
   </div>
</body>
</html>
