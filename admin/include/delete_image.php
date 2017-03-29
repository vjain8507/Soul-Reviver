<?php
    include("connect.php");
	if(isset($_GET['de']))
	{
		$delete_id = $_GET['de'];
        $row_file = mysqli_fetch_array(mysqli_query($con,"select imgname from gallery where sno=$delete_id"));
        $image = $row_file['imgname'];
        unlink("../../image/gallery/$image");
		$delete_a = "delete from gallery where sno='$delete_id'";
		mysqli_query($con,$delete_a);
		echo "<script>alert('Image Has Been Deleted')</script>";
		echo "<script>window.open('./home.php?gallery','_self')</script>";
	}
?>
