<?php
    require('db.php');

    if(isset($_GET['deleteid'])){
        $message_ID = $_GET['deleteid'];
        $sql = "DELETE FROM Messages WHERE message_ID = $message_ID";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "Deleted successfully";
            header('location:messages.php');
        } else{
            die(mysqli_error($conn));
        }
    }
?>
