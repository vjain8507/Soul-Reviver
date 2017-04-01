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
<div class="container" style="padding-top:150px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h2>SIGN IN</h2>
                </div>
                <div class="panel-body">
                    <form action="./?signin" method="post" enctype="multipart/form-data">
                        <table>
                            <thead>
                                <col width="50%">
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:center;">USERNAME</td>
                                    <td><input name="username" type="text" required></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">PASSWORD</td>
                                    <td><input name="password" type="password" required></td>
                                </tr>
                                <tr>
                                    <td><button name="login" type="submit" class="btn btn-info btn-block">LOGIN</button></td>
                                    <td><button class="btn btn-info btn-block" onclick="location.href='./?confirm&reset';">FORGOT PASSWORD</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
	if(isset($_POST['login']))
	{
		$log_username=$_POST['username'];
		$log_password=$_POST['password'];
        $run_login = mysqli_query($con,"select * from login where log_username='$log_username' and log_password='$log_password' and log_approve='yes'");
		if(mysqli_num_rows($run_login))
		{
            $_SESSION['username']=$log_username;
			echo "<script>window.open('./','_self')</script>";
		}
		else
			echo "<script>alert('Username Or Password Is Incorrect Or Not Confirmed Your E-mail.')</script>";
	}
?>