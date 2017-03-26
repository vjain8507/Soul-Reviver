<?php
	if(!$_SESSION['username'])
	{
		header("Location: ./");
	}
?>
    <?php
    if(isset($_SESSION['username']))
    {
        $get_user = $_SESSION['username'];
        $get_user_detail = "select * from login where log_username='$get_user'";
        $run_user_detail = mysqli_query($con,$get_user_detail);
        while($row_user = mysqli_fetch_array($run_user_detail))
        {
            $log_username = $row_user['log_username'];
            $log_password = $row_user['log_password'];
            $log_image = $row_user['log_image'];
            $log_name = $row_user['log_name'];
            $log_gender = $row_user['log_gender'];
            $log_email = $row_user['log_email'];
            $log_mobile = $row_user['log_mobile'];
            $log_address = $row_user['log_address'];
            $log_city = $row_user['log_city'];
            $log_state = $row_user['log_state'];
            $log_zip = $row_user['log_zip'];
            $log_plan = $row_user['log_plan'];
        }
    }
?>
        <script>
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            };

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

        </style>
        <div class="container" style="padding-top:150px;">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h2>EDIT DETAIL</h2>
                        </div>
                        <div class="panel-body">
                            <form action="./?edit_detail" method="post" enctype="multipart/form-data">
                                <div class="form-group" style="text-align:center;">
                                    <img id="output" class="thumbnail img-preview img-responsive " src="image/users/<?php echo $log_image; ?>" height="150" width="150">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <div class="fileUpload btn btn-danger fake-shadow">
                                                <span>CHANGE PHOTO</span>
                                                <input id="logo-id" name="image" type="file" class="attachment_upload" accept="image/*" onchange="loadFile(event)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table>
                                    <tr>
                                        <td>SELECT PLAN</td>
                                        <td>
                                            <?php
                                        if($log_plan=='Member')
                                            echo "<input type='radio' name='plan' value='Member' checked>&nbsp;&nbsp;Member<br><input type='radio' name='plan' value='Non Member'>&nbsp;&nbsp;Non Member";
                                        else
                                            echo "<input type='radio' name='plan' value='Member'>&nbsp;&nbsp;Member<br><input type='radio' name='plan' value='Non Member' checked>&nbsp;&nbsp;Non Member";
                                    ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>NAME</td>
                                        <td><input name="name" type="text" value="<?php echo $log_name; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>GENDER</td>
                                        <td>
                                            <?php
                                        if($log_gender=='Male')
                                            echo "<input type='radio' name='gender' value='Male' checked>&nbsp;&nbsp;Male<br><input type='radio' name='gender' value='Female'>&nbsp;&nbsp;Female<br><input type='radio' name='gender' value='Other'>&nbsp;&nbsp;Other";
                                        else if($log_gender=='Female')
                                            echo "<input type='radio' name='gender' value='Male'>&nbsp;&nbsp;Male<br><input type='radio' name='gender' value='Female' checked>&nbsp;&nbsp;Female<br><input type='radio' name='gender' value='Other'>&nbsp;&nbsp;Other";
                                        else
                                            echo "<input type='radio' name='gender' value='Male'>&nbsp;&nbsp;Male<br><input type='radio' name='gender' value='Female'>&nbsp;&nbsp;Female<br><input type='radio' name='gender' value='Other' checked>&nbsp;&nbsp;Other";
                                    ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>MOBILE NUMBER</td>
                                        <td>
                                            <div class="input-group"><span class="input-group-addon">+91</span><input name="mobile" type="tel" value="<?php echo $log_mobile; ?>" required></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ADDRESS</td>
                                        <td><input name="address" type="text" value="<?php echo $log_address; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>CITY</td>
                                        <td><input name="city" type="text" value="<?php echo $log_city; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>STATE</td>
                                        <td><input name="state" type="text" value="<?php echo $log_state; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>ZIP CODE</td>
                                        <td><input name="zip" type="text" value="<?php echo $log_zip; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>CHANGE PASSWORD</td>
                                        <td><input name="password" type="password" id="password"></td>
                                    </tr>
                                    <tr>
                                        <td>CONFIRM PASSWORD <span id="tick"></span></td>
                                        <td><input name="cpassword" type="password" id="cpassword"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><button name="submit" id="submit" type="submit" class="btn btn-info btn-block">SUBMIT</button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    include("include/connect.php");
	if(isset($_POST['submit']))
	{
        $get_user = $_SESSION['username'];
		$log_plan=$_POST['plan'];
		$log_name=$_POST['name'];
        $log_gender=$_POST['gender'];
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
        if($log_password!=$log_cpassword)
        {
            echo "<script>alert('Confirm Password Do Not Match!!!')</script>";
            echo "<script>window.open('./?account','_self')</script>";
        }
        else
        {
            move_uploaded_file($log_image_tmp,"image/users/$newname");
            if($log_password=='')
                $insert_log = "update login set log_image='$newname', log_name='$log_name', log_gender='$log_gender', log_mobile='$log_mobile', log_address='$log_address', log_city='$log_city', log_state='$log_state', log_zip='$log_zip', log_plan='$log_plan' where log_email='$get_user'";
            else
                $insert_log = "update login set log_image='$newname', log_name='$log_name', log_gender='$log_gender', log_mobile='$log_mobile', log_address='$log_address', log_city='$log_city', log_state='$log_state', log_zip='$log_zip', log_password='$log_password', log_plan='$log_plan' where log_email='$get_user'";
            $run_log = mysqli_query($con,$insert_log);
            echo "<script>alert('Account Details Edited.')</script>";
            echo "<script>window.open('./?account','_self')</script>";
        }
    }
?>
