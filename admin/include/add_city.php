<form action="./home.php?add_city" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <span>City - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="city" class="mdl-textfield__input" rows="2" type="text" id="city"></textarea>
                </div>
            </td>
        </tr>
        <tr style="text-align:center;">
            <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="add_city">Add</button></td>
        </tr>
    </table>
</form>
<?php
	if(isset($_POST['add_city']))
	{
        $city_name = $_POST['city'];
		if($city_name=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
			mysqli_query($con,"insert into city (city_name) values ('$city_name')");
			echo "<script>alert('City Has Been Added Successfully.')</script><script>window.open('./home.php?city','_self')</script>";
		}
	}
?>