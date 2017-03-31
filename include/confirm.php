<style>
    .panel-body input {
        display: block;
        width: 100%;
        padding-left: 10px;
        border: 1px solid #000;
    }
    
    .panel-body table {
        width: 100%;
        max-width: none;
    }
    
    .panel-body td {
        padding-top: 10px;
        padding-bottom: 10px;
        color: #000000;
    }
    
    .panel-body table td.shrink {
        white-space: nowrap;
    }
    
    .panel-body table td.expand {
        width: 100%;
    }
    
    .panel-heading {
        text-align: center;
    }

</style>
<?php
    include("include/connect.php");
	if(isset($_GET['key']))
	{
		$log_key=$_GET['key'];
        $row_key = mysqli_fetch_array(mysqli_query($con,"select log_id,log_approve from login where log_key='$log_key'"));
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
            mysqli_query($con,"update login set log_approve='yes' where log_id='$log_id'");
            echo "<div style='padding-top:200px;font-size:30px;text-align:center;'><p>Your E-mail Confirmed. Go To <a href='./?signin'>SIGN IN</a> Page.</p></div>";
        }
    }
    if(isset($_GET['reset']))
    {
        echo "<div class='container' style='padding-top:150px;'><div class='row'><div class='col-md-6 col-md-offset-3'><div class='panel panel-success'><div class='panel-heading'><h2>RESET PASSWORD</h2></div><div class='panel-body'><form action='./?confirm' method='post' enctype='multipart/form-data'><table><tr><td style='text-align:center;'>ENTER YOUR EMAIL</td><td><input name='email' type='email' required></td></tr><tr><td colspan='2'><button name='sendmail' type='submit' class='btn btn-info btn-block'>SEND MAIL</button></td></tr></table></form></div></div></div></div></div>";
    }
    if(isset($_POST['sendmail']))
    {
        include("include/mail.php");
        $log_email = $_POST['email'];
        $log = mysqli_fetch_array(mysqli_query($con,"select log_name,log_key from login where log_email='$log_email'"));
        $log_name = $log['log_name'];
        $log_key = $log['log_key'];
        $log_key = $log_key.date('F d, Y h:i:s A');
        $log_key = md5($log_key);
        mysqli_query($con,"update login set log_key='$log_key', log_approve='no' where log_email='$log_email'");
        send_to_forgot($log_name,$log_email,$log_key);
        echo "<script>alert('Reset Password Mail Send.')</script>";
        echo "<script>window.open('./?confirm&reset','_self')</script>";
        
    }
    if(isset($_GET['resetkey']))
    {
        $log_key=$_GET['resetkey'];
        $row_key = mysqli_fetch_array(mysqli_query($con,"select log_id,log_approve from login where log_key='$log_key'"));
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
            echo "<div class='container' style='padding-top:150px;'><div class='row'><div class='col-md-6 col-md-offset-3'><div class='panel panel-success'><div class='panel-heading'><h2>SET NEW PASSWORD FOR YOUR ACCOUNT</h2></div><div class='panel-body'><form action='./?confirm' method='post' enctype='multipart/form-data'><table><tr><td>PASSWORD</td><td><input name='password' type='password' id='password'></td></tr><tr><td>CONFIRM PASSWORD <span id='tick'></span></td><td><input name='cpassword' type='password' id='cpassword'></td></tr><tr><td colspan='2'><input type='hidden' name='logid' value='$log_id'></td></tr><tr><td colspan='2'><button name='updatepass' type='submit' class='btn btn-info btn-block'>CONFIRM RESET PASSWORD</button></td></tr></table></form></div></div></div></div></div>";
        }
    }
    if(isset($_POST['updatepass']))
    {
        $log_id = $_POST['logid'];
        $log_password = $_POST['password'];
        $log_cpassword = $_POST['cpassword'];
        if($log_password=='' OR $log_cpassword=='')
        {
            echo "<script>alert('Please Fill All The Fields!!!')</script>";
            exit();
        }
        else
        {
            if($log_password!=$log_cpassword)
            {
                echo "<script>alert('Password Do Not Match. Click On The Link Send On Your Mail And Proceed Accordingly.')</script>";
                echo "<script>window.open('./?confirm&reset','_self')</script>";
            }
            else
            {
                include("include/mail.php");
                mysqli_query($con,"update login set log_password='$log_password', log_approve='yes' where log_id='$log_id'");
                $detail = mysqli_fetch_array(mysqli_query($con,"select log_name,log_email from login where log_id='$log_id'"));
                $log_name = $detail['log_name'];
                $log_email = $detail['log_email'];
                send_to_confirm($log_name,$log_email);
                echo "<script>alert('Password Changed Successfully.')</script>";
                echo "<script>window.open('./?signin','_self')</script>";
            }
        }
    }
?>
