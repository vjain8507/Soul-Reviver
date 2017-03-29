<?php
	if(isset($_GET['de']))
	{
        include("connect.php");
		$delete_id = $_GET['de'];
		$delete_section = "delete from section where section_id='$delete_id'";
		mysqli_query($con,$delete_section);
		echo "<script>alert('Section Has Been Deleted')</script>";
		echo "<script>window.open('./home.php?section','_self')</script>";
	}
?>
