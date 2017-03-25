<?php
    include("connect.php");
	if(isset($_GET['de']))
	{
		$delete_id = $_GET['de'];
        $row_file = mysqli_fetch_array(mysqli_query($con,"select event_image from nevent where event_id=$delete_id"));
        $event_image = $row_file['event_image'];
        unlink("../../image/news-events/$event_image");
		$delete_a = "delete from nevent where event_id='$delete_id'";
		$run_delete = mysqli_query($con,$delete_a);
		echo "<script>alert('News/Event Has Been Deleted')</script>";
		echo "<script>window.open('./home.php?news-events','_self')</script>";
	}
?>