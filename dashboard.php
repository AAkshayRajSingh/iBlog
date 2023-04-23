
    <?php
    require('db.php');
    include("auth.php");
    include("header.php");
?>
<?php 
$image_url='profilepic.png';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex" />
    <title>Dashboard - Secured Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <style>
        body {
            background-color: #ffffcc;
        }
    </style>
</head>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Blogposts.php">Blogposts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Statistics.php">Statistics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Accountstatus.php">Accountstatus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Category.php">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Activitylog.php">Activities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="comments.php">Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ratings.php">Rating</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="views.php">Views</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Searchhistory.php">Searchhistory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="messages.php">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="like.php">Like</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dislike.php">Dislike</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="settings.php">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container my-5">
    <img src="<?php echo $image_url;?>" class="img-fluid rounded-circle mx-auto d-block mb-3" alt="Profile picture">
<h1 class="text-center">Welcome to your Dashboard!</h1>
        <p class="lead text-center">This is your profile page.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>



