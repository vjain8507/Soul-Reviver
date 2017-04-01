<?php
    if(isset($_GET['ev']))
    {
        $edit_id = $_GET['ev'];
        $run_position = mysqli_query($con,"select * from position_old where position_id='$edit_id'");
        while($row_position = mysqli_fetch_array($run_position))
        {
            $position_id = $row_position['position_id'];
            $position_name = $row_position['position_name'];
        }
    }
?>
    <form action="./home.php?edit_position&ev=<?php echo $position_id; ?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <span>Position - </span>
                </td>
                <td>
                    <div class="mdl-textfield mdl-js-textfield">
                        <textarea name="position" class="mdl-textfield__input" rows="2" type="text" id="position"><?php echo $position_name; ?></textarea>
                    </div>
                </td>
            </tr>
            <tr style="text-align:center;">
                <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="update_position">Add</button></td>
            </tr>
        </table>
    </form>
    <?php
	if(isset($_POST['update_position']))
	{
		$update_id = $_GET['ev'];
		$position_name = $_POST['position'];
		if($position_name=='')
		{
			echo "<script>alert('Please Fill The Given Field')</script>";
			exit();
		}
		else
		{
            mysqli_query($con,"update position set position_name='$position_name' where position_id='$update_id'");
            mysqli_query($con,"update therapist set position_name='$position_name' where position_id='$update_id'");
            mysqli_query($con,"update position_old set position_name='$position_name' where position_id='$update_id'");
			echo "<script>alert('Position Has Been Updated')</script><script>window.open('./home.php?position','_self')</script>";
		}
	}
?>