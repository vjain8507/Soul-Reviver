<?php
    if(isset($_GET['ev']))
    {
        $edit_id = $_GET['ev'];
        $run_query = mysqli_query($con,"select * from cat where cat_id='$edit_id'");
        while($row_cat = mysqli_fetch_array($run_query))
        {
            $cat_id = $row_cat['cat_id'];
            $cat_name = $row_cat['cat_name'];
        }
    }
?>
    <form action="./home.php?edit_cat&ev=<?php echo $cat_id; ?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <span>Category - </span>
                </td>
                <td>
                    <div class="mdl-textfield mdl-js-textfield">
                        <textarea name="category" class="mdl-textfield__input" rows="2" type="text" id="category"><?php echo $cat_name; ?></textarea>
                    </div>
                </td>
            </tr>
            <tr style="text-align:center;">
                <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="update_cat">Add</button></td>
            </tr>
        </table>
    </form>
    <?php
	if(isset($_POST['update_cat']))
	{
		$update_id = $_GET['ev'];
		$cat_name = $_POST['category'];
		if($cat_name=='')
		{
			echo "<script>alert('Please Fill The Given Field')</script>";
			exit();
		}
		else
		{
			mysqli_query($con,"update cat set cat_name='$cat_name' where cat_id='$update_id'");
            mysqli_query($con,"update post set cat_name='$cat_name' where cat_id='$update_id'");
			echo "<script>alert('Category Has Been Updated')</script><script>window.open('./home.php?category','_self')</script>";
		}
	}
?>