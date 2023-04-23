<?php
	require('db.php');
	
	
	
if(isset($_GET['deleteid'])){
    $accountstatus_ID=$_GET['deleteid'];
    $sql="DELETE FROM `Accountstatus` WHERE accountStatus_ID=$accountstatus_ID";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "Deleted successfully";
        header('location:Accountstatus.php');
    }
    else{
        die(mysqli_error($conn));
    }
}

?>

