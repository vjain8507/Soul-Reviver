<?php
	if(isset($_GET['de']))
	{
		$delete_id = $_GET['de'];
        $row_file = mysqli_fetch_array(mysqli_query($con,"select image from ttopic where sno=$delete_id"));
        $image = $row_file['image'];
        unlink("../../image/ttopics/$image");
		mysqli_query($con,"delete from ttopic where sno='$delete_id'");
		echo "<script>alert('Topic Has Been Deleted')</script><script>window.open('./home.php?ttopics','_self')</script>";
	}
?>