<?php
    include("connect.php");
	if(isset($_GET['de']))
	{
		$delete_id = $_GET['de'];
        $row_file = mysqli_fetch_array(mysqli_query($con,"select ad_image from ad where ad_id=$delete_id"));
        $ad_image = $row_file['ad_image'];
        unlink("../../image/ads/$ad_image");
		$delete_a = "delete from ad where ad_id='$delete_id'";
		$run_delete = mysqli_query($con,$delete_a);
		echo "<script>alert('Ad Has Been Deleted')</script>";
		echo "<script>window.open('./home.php?ad','_self')</script>";
	}
?>