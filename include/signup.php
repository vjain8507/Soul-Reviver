<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

    function activateButton(element) {
        if (element.checked) {
            document.getElementById("submit").disabled = false;
        } else {
            document.getElementById("submit").disabled = true;
        }
    }
</script>
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
    
    .panel-body input[type="radio"] {
        clear: none;
        width: auto;
        display: inline-block;
        float: left;
    }
    
    .panel-body input[type="checkbox"] {
        clear: none;
        width: auto;
        display: inline-block;
        float: left;
        margin-right:10px;
    }
    
    .input-group-addon {
        background-color: #FFFFFF;
        font-size: 15px;
        border-radius: 0 !important;
        border: 1px solid #000000;
        padding-top: 0px;
        padding-bottom: 0px;
        margin: 0px;
        color: #000000;
        user-select: none;
        cursor: default;
    }
    
    table td b {
        color: #FF0000;
        font-size: 20px;
    }
</style>
<div class="container" style="padding-top:150px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h2>SIGN UP</h2>
                </div>
                <div class="panel-body">
                    <form action="./?signup" method="post" enctype="multipart/form-data">
                        <div class="form-group" style="text-align:center;">
                            <img id="output" class="thumbnail img-preview img-responsive " src="image/others/150x150.png" height="150" width="150">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <div class="fileUpload btn btn-danger fake-shadow">
                                        <span>UPLOAD PHOTO</span>
                                        <input id="logo-id" name="image" type="file" class="attachment_upload" accept="image/*" onchange="loadFile(event)" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table>
                            <tr>
                                <td>SELECT PLAN</td>
                                <td><input type="radio" name="plan" value="Member">&nbsp;&nbsp;Member<br><input type="radio" name="plan" value="Non Member" checked>&nbsp;&nbsp;Non Member</td>
                            </tr>
                            <tr>
                                <td>NAME</td>
                                <td><input name="name" type="text" required></td>
                            </tr>
                            <tr>
                                <td>GENDER</td>
                                <td><input type="radio" name="gender" value="Male">&nbsp;&nbsp;Male<br><input type="radio" name="gender" value="Female">&nbsp;&nbsp;Female<br><input type="radio" name="gender" value="Other">&nbsp;&nbsp;Other</td>
                            </tr>
                            <tr>
                                <td>EMAIL ADDRESS</td>
                                <td><input name="email" type="email" required></td>
                            </tr>
                            <tr>
                                <td>MOBILE NUMBER</td>
                                <td><div class="input-group"><span class="input-group-addon">+91</span><input name="mobile" type="tel" required></div></td>
                            </tr>
                            <tr>
                                <td>ADDRESS</td>
                                <td><input name="address" type="text" required></td>
                            </tr>
                            <tr>
                                <td>CITY</td>
                                <td><input name="city" type="text" required></td>
                            </tr>
                            <tr>
                                <td>STATE</td>
                                <td><input name="state" type="text" required></td>
                            </tr>
                            <tr>
                                <td>ZIP CODE</td>
                                <td><input name="zip" type="text"></td>
                            </tr>
                            <tr>
                                <td>PASSWORD</td>
                                <td><input name="password" type="password" id="password"></td>
                            </tr>
                            <tr>
                                <td>CONFIRM PASSWORD <span id="tick"></span></td>
                                <td><input name="cpassword" type="password" id="cpassword"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="checkbox" onchange="activateButton(this)">I Accept Terms & Conditions</td>
                            </tr>
                            <tr>
                                <td colspan="2"><button name="submit" id="submit" type="submit" class="btn btn-info btn-block" disabled>SUBMIT</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
	if(isset($_POST['submit']))
	{
		$log_plan=$_POST['plan'];
		$log_name=$_POST['name'];
        $log_gender=$_POST['gender'];
        $log_email=$_POST['email'];
        $log_mobile=$_POST['mobile'];
        $log_address=$_POST['address'];
        $log_city=$_POST['city'];
        $log_state=$_POST['state'];
        $log_zip=$_POST['zip'];
        $log_password=$_POST['password'];
        $log_cpassword=$_POST['cpassword'];
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension'];
        $newname = "$log_email.$ext";
		$log_image_tmp = $_FILES['image']['tmp_name'];
        $status=0;
        $run_email = mysqli_query($con,"select log_email from login");
        while($row_email = mysqli_fetch_array($run_email))
        {
            $email_user = $row_email['log_email'];
            if($email_user==$log_email)
            {
                $status=1;
                break;
            }
        }
        if($status==1)
        {
            echo "<script>alert('Already Registered User!!!')</script>";
            exit();
        }
		else if($newname=='' OR $log_plan=='' OR $log_name=='' OR $log_gender=='' OR $log_email=='' OR $log_mobile=='' OR $log_address=='' OR $log_city=='' OR $log_state=='' OR $log_password=='' OR $log_cpassword=='')
		{
			echo "<script>alert('Please Fill All The Fields!!!')</script>";
			exit();
		}
		else
		{
            if($log_password!=$log_cpassword)
                echo "<script>alert('Registration Unsuccessful!!!')</script><script>window.open('./?signup','_self')</script>";
            else
            {
                include("include/mail.php");
                $log_key=md5($log_name.$log_email.$log_gender.date('F d, Y h:i:s A'));
                move_uploaded_file($log_image_tmp,"image/users/$newname");
                mysqli_query($con,"insert into login (log_image,log_name,log_gender,log_email,log_mobile,log_address,log_city,log_state,log_zip,log_username,log_password,log_plan,log_key,log_approve) values ('$newname','$log_name','$log_gender','$log_email','$log_mobile','$log_address','$log_city','$log_state','$log_zip','$log_email','$log_password','$log_plan','$log_key','no')");
                send_to_register($log_name,$log_email,$log_key);
                echo "<script>alert('Registration Complete, Check Your Mail To Confirm.')</script><script>window.open('./?signin','_self')</script>";
            }
		}
	}
?>