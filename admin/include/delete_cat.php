<?php
	if(isset($_GET['de']))
	{
        include("connect.php");
		$delete_id = $_GET['de'];
		mysqli_query($con,"delete from cat where cat_id='$delete_id'");
        mysqli_query($con,"delete from post where cat_id='$delete_id'");
		echo "<script>alert('Category Has Been Deleted')</script>";
		echo "<script>window.open('./home.php?category','_self')</script>";
	}
?>
