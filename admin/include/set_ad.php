<?php
    if(isset($_GET['id']))
	{
		$set_id = $_GET['id'];
        mysqli_query($con,"update ad set ad_status='0'");
        mysqli_query($con,"update ad set ad_status=1 where ad_id='$set_id'");
        echo "<script>alert('Ad Has Been Set')</script><script>window.open('./home.php?ad','_self')</script>";
    }
?>