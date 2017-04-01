<form action="./home.php?add_section" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <span>Section - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="section" class="mdl-textfield__input" rows="2" type="text" id="section"></textarea>
                </div>
            </td>
        </tr>
        <tr style="text-align:center;">
            <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="add_section">Add</button></td>
        </tr>
    </table>
</form>
<?php
	if(isset($_POST['add_section']))
	{
        $section_name = $_POST['section'];
		if($section_name=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
			mysqli_query($con,"insert into section (section_name) values ('$section_name')");
			echo "<script>alert('Section Has Been Added Successfully')</script><script>window.open('./home.php?section','_self')</script>";
		}
	}
?>