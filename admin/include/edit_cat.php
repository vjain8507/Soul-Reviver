<?php
    include("connect.php");
    if(isset($_GET['ev']))
    {
        $edit_id = $_GET['ev'];
        $select_cat = "select * from cat where cat_id='$edit_id'";
        $run_query = mysqli_query($con,$select_cat);
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
        <tr colspan="2" style="text-align:center;">
            <td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="update_cat">Add</button></td>
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
			$update_cat = "UPDATE cat SET cat_name='$cat_name' WHERE cat_id='$update_id'";
			$run_update = mysqli_query($con,$update_cat);
			echo "<script>alert('Category Has Been Updated')</script>";
			echo "<script>window.open('./home.php?category','_self')</script>";
		}
	}
?>