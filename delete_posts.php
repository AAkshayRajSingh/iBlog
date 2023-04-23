<?php
	require('db.php');
	
	
	
if(isset($_GET['deleteid'])){
    $Blog_ID=$_GET['deleteid'];
    $sql="DELETE FROM `Blog_posts` WHERE Blog_ID=$Blog_ID";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "Deleted successfully";
        header('location:Blogposts.php');
    }
    else{
        die(mysqli_error($conn));
    }
}

?>