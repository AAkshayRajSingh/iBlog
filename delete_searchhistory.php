<?php
	require('db.php');
	
	
	
if(isset($_GET['deleteid'])){
    $search_ID=$_GET['deleteid'];
    $sql="DELETE FROM `SearchHistory` WHERE Search_ID=$search_ID";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "Deleted successfully";
        header('location:Searchhistory.php');
    }
    else{
        die(mysqli_error($conn));
    }
}

?>




