<?php
    include("include/connect.php");
	if(isset($_GET['key']))
	{
		$log_key=$_GET['key'];
        $select_key = "select log_id,log_approve from login where log_key='$log_key'";
        $run_query = mysqli_query($con,$select_key);
        $row_key = mysqli_fetch_array($run_query);
        $log_id=$row_key['log_id'];
        $log_approve=$row_key['log_approve'];
        if($log_id=='')
        {
            echo "<div style='padding-top:200px;font-size:30px;text-align:center;'><p>Your E-mail Not Confirmed. Go To <a href='./?signup'>SIGN UP</a> Page And Fill Your Details Again.</p></div>";
        }
        else if($log_approve=='yes')
        {
            echo "<div style='padding-top:200px;font-size:30px;text-align:center;'><p>Your E-mail Already Confirmed. Go To <a href='./?signin'>SIGN IN</a> Page.</p></div>";
        }
        else
        {
            $update_login = "update login set log_approve='yes' where log_id='$log_id'";
            mysqli_query($con,$update_login);
            echo "<div style='padding-top:200px;font-size:30px;text-align:center;'><p>Your E-mail Confirmed. Go To <a href='./?signin'>SIGN IN</a> Page.</p></div>";
        }
    }
?>
