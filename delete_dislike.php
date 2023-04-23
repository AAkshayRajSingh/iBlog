<?php
    require('db.php');

    if(isset($_GET['dislike_ID'])){
        $dislike_ID = $_GET['dislike_ID'];
        $sql = "DELETE FROM Dislike WHERE dislike_ID = $dislike_ID";
      
     $result = mysqli_query($conn, $sql);
        if($result){
            echo "Deleted successfully";
            header('location:dislike.php');
        } else{
            die(mysqli_error($conn));
        }
    }
?>
