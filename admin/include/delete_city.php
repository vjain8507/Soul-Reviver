<?php
	if(isset($_GET['de']))
	{
        include("connect.php");
		$delete_id = $_GET['de'];
		$delete_city = "delete from city where city_id='$delete_id'";
		mysqli_query($con,$delete_city);
		echo "<script>alert('City Has Been Deleted')</script>";
		echo "<script>window.open('./home.php?city','_self')</script>";
	}
?>
