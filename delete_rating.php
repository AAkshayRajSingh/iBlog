<?php
	require('db.php');
	
	
	
if(isset($_GET['deleteid'])){
    $rating_ID=$_GET['deleteid'];
    $sql="DELETE FROM `Rating` WHERE rating_ID=$rating_ID";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "Deleted successfully";
        header('location:ratings.php');
    }
    else{
        die(mysqli_error($conn));
    }
}

?>