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
    var loadFile=function(event){
        var output=document.getElementById('output');
        output.src=URL.createObjectURL(event.target.files[0]);
    };
</script>
<style>
    .panel-body table{width:100%;max-width:none;}
    .panel-body td{padding-top:10px;padding-bottom:10px;color:#000000;}
    .panel-heading{text-align:center;}
</style>
<div class="container" style="padding-top:150px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-success">
                <div class="panel-heading"><h2>MY ACCOUNT</h2></div>
                <div class="panel-body">
                    <div class="form-group" style="text-align:center;">
                            <img id="output" class="thumbnail img-preview img-responsive " src="image/users/<?php echo $log_image; ?>" height="150" width="150">
                        </div>
                    <table>
                        <tr>
                            <td>PLAN</td>
                            <td><?php echo $log_plan; ?></td>
                        </tr>
                        <tr>
                            <td>USERNAME</td>
                            <td><?php echo $log_username; ?></td>
                        </tr>
                        <tr>
                            <td>PASSWORD</td>
                            <td><?php echo str_repeat(" * ", strlen($log_password)); ?></td>
                        </tr>
                        <tr>
                            <td>NAME</td>
                            <td><?php echo $log_name; ?></td>
                        </tr>
                        <tr>
                            <td>GENDER</td>
                            <td><?php echo $log_gender; ?></td>
                        </tr>
                        <tr>
                            <td>EMAIL</td>
                            <td><?php echo $log_email; ?></td>
                        </tr>
                        <tr>
                            <td>MOBILE</td>
                            <td><?php echo $log_mobile; ?></td>
                        </tr>
                        <tr>
                            <td>ADDRESS</td>
                            <td><?php echo $log_address; ?></td>
                        </tr>
                        <tr>
                            <td>CITY</td>
                            <td><?php echo $log_city; ?></td>
                        </tr>
                        <tr>
                            <td>STATE</td>
                            <td><?php echo $log_state; ?></td>
                        </tr>
                        <tr>
                            <td>ZIP</td>
                            <td><?php echo $log_zip; ?></td>
                        </tr>
                        <tr style="text-align:center;">
                            <td colspan="2"><a href='./?edit_detail' class='btn btn-primary'>EDIT DETAILS</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>