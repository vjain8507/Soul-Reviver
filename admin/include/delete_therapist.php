<?php
    include("connect.php");
	if(isset($_GET['de']))
	{
		$delete_id = $_GET['de'];
        $row_therapist = mysqli_fetch_array(mysqli_query($con,"select image from therapist where id=$delete_id"));
        $therapist_image = $row_therapist['image'];
        unlink("../../image/therapist/$therapist_image");
		$delete_a = "delete from therapist where id='$delete_id'";
		mysqli_query($con,$delete_a);
		echo "<script>alert('Therapist Has Been Deleted')</script>";
		echo "<script>window.open('./home.php?therapist','_self')</script>";
	}
?>
