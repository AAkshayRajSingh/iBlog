<?php
    require('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
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
        <button class="btn btn-primary my-5"><a class="text-light">Settings</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">settings_Id</th>
                    <th scope="col">settings_value</th>
                    <th scope="col">setting_changed_date</th>
                    <th scope="col">User_ID</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `Settings`;";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $settings_Id=$row['settings_Id']; 
                            $settings_value=$row['settings_value'];
                            $setting_changed_date=$row['setting_changed_date'];
                            $User_ID=$row['User_ID'];
                            $Actions=$row['Actions'];
                            
                            echo ' <tr>
                            <th scope="row">'.$settings_Id.'</th>
                            <td>'.$settings_value.'</td>
                            <td>'.$setting_changed_date.'</td>
                            <td>'.$User_ID.'</td>
                            <td>'.$Actions.'</td>
                            
                            <td> 
                            <div class="btn-group">
                                <button class="btn btn-primary mr-2"><a href="update_settings.php?updateid='.$settings_Id.'" class="text-light">Update</a></button>
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
