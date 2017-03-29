<?php
	if(isset($_GET['de']))
	{
        include("connect.php");
		$delete_id = $_GET['de'];
		$delete_position = "delete from position_old where position_id='$delete_id'";
		mysqli_query($con,$delete_position);
		echo "<script>alert('Position Has Been Deleted')</script>";
		echo "<script>window.open('./home.php?position','_self')</script>";
	}
?>
