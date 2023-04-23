<?php
	require('db.php');
	
	
	
if(isset($_GET['deleteid'])){
    $Comment_ID=$_GET['deleteid'];
    $sql="DELETE FROM `Comments` WHERE Comment_ID=$Comment_ID";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "Deleted successfully";
        header('location:Comments.php');
    }
    else{
        die(mysqli_error($conn));
    }
}

?>