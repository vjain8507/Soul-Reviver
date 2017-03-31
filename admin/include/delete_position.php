<?php
	if(isset($_GET['de']))
	{
        include("connect.php");
		$delete_id = $_GET['de'];
		mysqli_query($con,"delete from position_old where position_id='$delete_id'");
        mysqli_query($con,"delete from position where position_id='$delete_id'");
        mysqli_query($con,"delete from therapist where position_id='$delete_id'");
		echo "<script>alert('Position Has Been Deleted')</script>";
		echo "<script>window.open('./home.php?position','_self')</script>";
	}
?>
