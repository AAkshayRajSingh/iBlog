<?php
    require('db.php');

    if(isset($_GET['deleteid'])){
        $like_ID = $_GET['deleteid'];
        $sql = "DELETE FROM `Like` WHERE like_ID = $like_ID";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "Deleted successfully";
            header('location:like.php');
        } else{
            die(mysqli_error($conn));
        }
    }
?>
