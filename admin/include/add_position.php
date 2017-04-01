<form action="./home.php?add_position" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <span>Position - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="position" class="mdl-textfield__input" rows="2" type="text" id="position"></textarea>
                </div>
            </td>
        </tr>
        <tr style="text-align:center;">
            <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="add_position">Add</button></td>
        </tr>
    </table>
</form>
<?php
	if(isset($_POST['add_position']))
	{
        $position_name = $_POST['position'];
		if($position_name=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
			mysqli_query($con,"insert into position_old (position_name) values ('$position_name')");
			echo "<script>alert('Position Has Been Added Successfully')</script><script>window.open('./home.php?position','_self')</script>";
		}
	}
?>