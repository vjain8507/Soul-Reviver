<?php
    include("connect.php");
    if(isset($_GET['ev']))
    {
        $edit_id = $_GET['ev'];
        $select_position = "select * from position_old where position_id='$edit_id'";
        $run_position = mysqli_query($con,$select_position);
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
			$update_position = "UPDATE position_old SET position_name='$position_name' WHERE position_id='$update_id'";
			mysqli_query($con,$update_position);
			echo "<script>alert('Position Has Been Updated')</script>";
			echo "<script>window.open('./home.php?position','_self')</script>";
		}
	}
?>
