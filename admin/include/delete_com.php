<?php
	if(isset($_GET['de']))
	{
		$delete_id = $_GET['de'];
		mysqli_query($con,"delete from com where com_id='$delete_id'");
		echo "<script>alert('Comment Has Been Deleted')</script>";
        if(isset($_GET['p']))
        {
            $postid = $_GET['p'];
            echo "<script>window.open('./home.php?comment&p=$postid','_self')</script>";
        }
        else
            echo "<script>window.open('./home.php?comment','_self')</script>";
	}
?>