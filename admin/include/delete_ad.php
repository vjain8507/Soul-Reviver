<?php
	if(isset($_GET['de']))
	{
		$delete_id = $_GET['de'];
        $row_file = mysqli_fetch_array(mysqli_query($con,"select ad_image from ad where ad_id=$delete_id"));
        $ad_image = $row_file['ad_image'];
        unlink("../../image/ads/$ad_image");
		mysqli_query($con,"delete from ad where ad_id='$delete_id'");
		echo "<script>alert('Ad Has Been Deleted')</script><script>window.open('./home.php?ad','_self')</script>";
	}
?>