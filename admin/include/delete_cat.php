<?php
	if(isset($_GET['de']))
	{
        include("connect.php");
		$delete_id = $_GET['de'];
		$delete_cat = "delete from cat where cat_id='$delete_id'";
		$run_delete = mysqli_query($con,$delete_cat);
		echo "<script>alert('Category Has Been Deleted')</script>";
		echo "<script>window.open('./home.php?category','_self')</script>";
	}
?>