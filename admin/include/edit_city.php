<?php
    include("connect.php");
    if(isset($_GET['ev']))
    {
        $edit_id = $_GET['ev'];
        $select_city = "select * from city where city_id='$edit_id'";
        $run_city = mysqli_query($con,$select_city);
        while($row_city = mysqli_fetch_array($run_city))
        {
            $city_id = $row_city['city_id'];
            $city_name = $row_city['city_name'];
        }
    }
?>
    <form action="./home.php?edit_city&ev=<?php echo $city_id; ?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <span>City - </span>
                </td>
                <td>
                    <div class="mdl-textfield mdl-js-textfield">
                        <textarea name="city" class="mdl-textfield__input" rows="2" type="text" id="city"><?php echo $city_name; ?></textarea>
                    </div>
                </td>
            </tr>
            <tr style="text-align:center;">
                <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="update_city">Add</button></td>
            </tr>
        </table>
    </form>
    <?php
	if(isset($_POST['update_city']))
	{
		$update_id = $_GET['ev'];
		$city_name = $_POST['city'];
		if($city_name=='')
		{
			echo "<script>alert('Please Fill The Given Field')</script>";
			exit();
		}
		else
		{
			mysqli_query($con,"update position set city_name='$city_name' where city_id='$update_id'");
            mysqli_query($con,"update therapist set city_name='$city_name' where city_id='$update_id'");
            mysqli_query($con,"update city set city_name='$city_name' where city_id='$update_id'");
			echo "<script>alert('City Has Been Updated')</script>";
			echo "<script>window.open('./home.php?city','_self')</script>";
		}
	}
?>
