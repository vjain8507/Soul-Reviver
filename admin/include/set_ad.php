<?php
    include("connect.php");
    if(isset($_GET['id']))
	{
		$set_id = $_GET['id'];
        $update_ad = "update ad set ad_status=0";
        mysqli_query($con,$update_ad);
        $update1_ad = "update ad set ad_status=1 where ad_id=$set_id";
        mysqli_query($con,$update1_ad);
        echo "<script>alert('Ad Has Been Set')</script>";
		echo "<script>window.open('./home.php?ad','_self')</script>";
    }
?>