<?php
    include("connect.php");
    if(isset($_GET['ev']))
    {
        $edit_id = $_GET['ev'];
        $select_section = "select * from section where section_id='$edit_id'";
        $run_query = mysqli_query($con,$select_section);
        while($row_section = mysqli_fetch_array($run_query))
        {
            $section_id = $row_section['section_id'];
            $section_name = $row_section['section_name'];
        }
    }
?>
<form action="./home.php?edit_section&ev=<?php echo $section_id; ?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <span>Section - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="section" class="mdl-textfield__input" rows="2" type="text" id="section"><?php echo $section_name; ?></textarea>
                </div>
            </td>
        </tr>
        <tr colspan="2" style="text-align:center;">
            <td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="update_section">Add</button></td>
        </tr>
    </table>
</form>
<?php
	if(isset($_POST['update_section']))
	{
		$update_id = $_GET['ev'];
		$section_name = $_POST['section'];
		if($section_name=='')
		{
			echo "<script>alert('Please Fill The Given Field')</script>";
			exit();
		}
		else
		{
			$update_section = "UPDATE section SET section_name='$section_name' WHERE section_id='$update_id'";
			$run_update = mysqli_query($con,$update_section);
			echo "<script>alert('Section Has Been Updated')</script>";
			echo "<script>window.open('./home.php?section','_self')</script>";
		}
	}
?>