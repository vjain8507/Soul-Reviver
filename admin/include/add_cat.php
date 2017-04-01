<form action="./home.php?add_cat" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <span>Category - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="category" class="mdl-textfield__input" rows="2" type="text" id="category"></textarea>
                </div>
            </td>
        </tr>
        <tr style="text-align:center;">
            <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="add_cat">Add</button></td>
        </tr>
    </table>
</form>
<?php
	if(isset($_POST['add_cat']))
	{
        $cat_name = $_POST['category'];
		if($cat_name=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
			$run_cat = mysqli_query($con,"insert into cat (cat_name) values ('$cat_name')");
			echo "<script>alert('Category Has Been Added Successfully')</script><script>window.open('./home.php?category','_self')</script>";
		}
	}
?>