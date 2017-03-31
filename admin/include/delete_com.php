<?php
	if(isset($_GET['de']))
	{
        include("connect.php");
		$delete_id = $_GET['de'];
		$delete_com = "delete from com where com_id='$delete_id'";
		mysqli_query($con,$delete_com);
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
