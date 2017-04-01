<?php
	if(isset($_GET['de']))
	{
		$delete_id = $_GET['de'];
        $row_file = mysqli_fetch_array(mysqli_query($con,"select post_image from post where post_id=$delete_id"));
        $post_image = $row_file['post_image'];
        unlink("../../image/post/$post_image");
		mysqli_query($con,"delete from post where post_id='$delete_id'");
		echo "<script>alert('Post Has Been Deleted')</script><script>window.open('./home.php?post','_self')</script>";
	}
?>