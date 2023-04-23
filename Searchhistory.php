<?php
	require('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search History</title>
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
    <button class="btn btn-primary my-5"><a 
       class="text-light">SearchHistory</a>
    </button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Search ID</th>
                    <th scope="col">Search Query</th>
                    <th scope="col">Search Result</th>
                    <th scope="col">Search Date</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `SearchHistory`;";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $search_ID = $row['Search_ID']; 
                            $searchQuery = $row['searchQuery'];
                            $searchResult = $row['searchResult'];
                            $searchDate = $row['SearchDate'];
                            $user_ID = $row['User_ID'];
                            echo ' <tr>
                                      <th scope="row">'.$search_ID.'</th>
                                      <td>'.$searchQuery.'</td>
                                      <td>'.$searchResult.'</td>
                                      <td>'.$searchDate.'</td>
                                      <td>'.$user_ID.'</td>
                                      <td> 
                                          <div class="btn-group">
                                              
                                              <button class="btn btn-danger">
                                                  <a href="delete_searchhistory.php?deleteid='.$search_ID.'" class="text-light">Delete</a>
                                              </button>
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
