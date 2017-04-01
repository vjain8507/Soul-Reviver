<?php
	if(isset($_GET['de']))
	{
		$delete_id = $_GET['de'];
        $row_file = mysqli_fetch_array(mysqli_query($con,"select imgname from gallery where sno=$delete_id"));
        $image = $row_file['imgname'];
        unlink("../../image/gallery/$image");
		mysqli_query($con,"delete from gallery where sno='$delete_id'");
		echo "<script>alert('Image Has Been Deleted')</script><script>window.open('./home.php?gallery','_self')</script>";
	}
?>