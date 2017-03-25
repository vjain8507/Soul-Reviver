<script>
    var loadFile=function(event){
        var output=document.getElementById('output');
        output.src=URL.createObjectURL(event.target.files[0]);
    };
    function activateButton(element){
        if(element.checked){
            document.getElementById("submit").disabled = false;
        }
        else{
            document.getElementById("submit").disabled = true;
        }
    }
</script>
<style>
    .panel-body input{
        display: block;
        width: 100%;
        padding-left:10px;
        border: 1px solid #000;
    }
    .panel-body table{
        width: 100%;
        max-width: none;
    }
    .panel-body td{
        padding-top: 10px;
        padding-bottom: 10px;
        color:#000000;
    }
    .panel-body table td.shrink{
        white-space:nowrap;
    }
    .panel-body table td.expand{
        width: 100%;
    }
    .panel-heading{
        text-align: center;
    }
    .panel-body input[type="radio"]{
        clear: none;
        width: auto;
        display: inline-block;
        float: left;
    }
    .panel-body input[type="checkbox"]{
        clear: none;
        width: auto;
        display: inline-block;
        float: left;
    }
    .input-group-addon{
        background-color:#FFFFFF;
        font-size:15px;
        border-radius:0 !important;
        border:1px solid #000000;
        padding-top:0px;
        padding-bottom:0px;
        margin:0px;
        color:#000000;
        user-select:none;
        cursor:default;
    }
    table td b{
        color:#FF0000;
        font-size:20px;
    }
</style>
-
<?php
    include("include/connect.php");
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
		if($newname=='' OR $log_plan=='' OR $log_name=='' OR $log_gender=='' OR $log_email=='' OR $log_mobile=='' OR $log_address=='' OR $log_city=='' OR $log_state=='' OR $log_password=='' OR $log_cpassword=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
            if($log_password!=$log_cpassword)
            {
                echo "<script>alert('Registration Unsuccessful!!!')</script>";
                echo "<script>window.open('./?signup','_self')</script>";
            }
            else
            {
                move_uploaded_file($log_image_tmp,"image/users/$newname");
                $insert_log = "insert into login (log_image,log_name,log_gender,log_email,log_mobile,log_address,log_city,log_state,log_zip,log_username,log_password,log_plan) values ('$newname','$log_name','$log_gender','$log_email','$log_mobile','$log_address','$log_city','$log_state','$log_zip','$log_email','$log_password','$log_plan')";
                $run_log = mysqli_query($con,$insert_log);
                echo "<script>alert('Registration Complete!!!')</script>";
                echo "<script>window.open('./?signin','_self')</script>";
            }
		}
	}
?>