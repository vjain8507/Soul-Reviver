<?php
	if(isset($_GET['de']))
	{
		$delete_id = $_GET['de'];
        $row_team = mysqli_fetch_array(mysqli_query($con,"select image from team where id=$delete_id"));
        $image = $row_team['image'];
        unlink("../../image/team/$image");
		mysqli_query($con,"delete from team where id='$delete_id'");
		echo "<script>alert('Team Member Has Been Deleted.')</script><script>window.open('./home.php?team','_self')</script>";
	}
?>