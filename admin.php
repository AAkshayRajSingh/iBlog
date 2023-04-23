<?php
session_start();
require('db.php');

if (isset($_POST['admin_username'])&& 
isset($_POST['password_admin'])) {
    $admin_username = $_POST['admin_username'];
    $password_admin = $_POST['password_admin'];

    $sql = "SELECT * FROM Admin WHERE admin_username = '$admin_username' AND password_admin = '$password_admin'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_Id'] = $row['admin_Id'];
        header("Location: admin_display.php");
    } else {
        echo "Invalid username or password";
    }
}
?>
<html>
<head>
    <?php include 'header.php'; ?>
    <meta name="robots" content="noindex" />
    <style>
        body {
            background-color: #ffffcc;
        }
    </style>
</head>
<body>

<div class="container">
    <form class="form-signin" method="POST">
        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
        <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <h2 class="form-signin-heading">Administrator Login</h2>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">@</span>
            <input type="text" name="admin_username" class="form-control" placeholder="admin_username" required>
        </div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password_admin" id="inputPassword" class="form-control" placeholder="password_admin" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
</div>

</body>
</html>