<?php include("connect.php"); ?>
<form action="./home.php?add_therapist" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <span>City - </span>
            </td>
            <td>
                <div class="mdl-selectfield mdl-js-selectfield">
                    <select class="mdl-selectfield__select" id="city" name="city">
                        <option selected disabled hidden>Select</option>
                        <?php
                            $get_city = "select * from city";
                            $run_city = mysqli_query($con,$get_city);
                            while($row_city = mysqli_fetch_array($run_city))
                            {
                                $city_name = $row_city['city_name'];
                                echo "<option value='$city_name'>$city_name</option>";
                            }
                        ?>
                    </select>
                    <label class="mdl-selectfield__label" for="city"></label>
              </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Position - </span>
            </td>
            <td>
                <div class="mdl-selectfield mdl-js-selectfield">
                    <select class="mdl-selectfield__select" id="position" name="position">
                        <option selected disabled hidden>Select</option>
                        <?php
                            $get_position = "select * from position_old";
                            $run_position = mysqli_query($con,$get_position);
                            while($row_position = mysqli_fetch_array($run_position))
                            {
                                $position_name = $row_position['position_name'];
                                echo "<option value='$position_name'>$position_name</option>";
                            }
                        ?>
                    </select>
                    <label class="mdl-selectfield__label" for="position"></label>
              </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Name - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="name" class="mdl-textfield__input" rows="2" type="text" id="name"></textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Image - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <input name="image" class="mdl-textfield__input" type="file" id="image">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Email - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="email" class="mdl-textfield__input" rows="2" type="text" id="email"></textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Mobile - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="mobile" class="mdl-textfield__input" rows="2" type="text" id="mobile"></textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Experience - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="experience" class="mdl-textfield__input" rows="2" type="text" id="experience"></textarea>
                </div>
            </td>
        </tr>
        <tr colspan="2" style="text-align:center;">
            <td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="add_therapist">Add</button></td>
        </tr>
    </table>
</form>
<?php
	if(isset($_POST['add_therapist']))
	{
        $city_name = $_POST['city'];
        $position_name = $_POST['position'];
        $name = $_POST['name'];
        $image = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $experience = $_POST['experience'];
		if($city_name=='' OR $position_name=='' OR $name=='' OR $image=='' OR $email=='' OR $mobile=='' OR $experience=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
            $city = mysqli_fetch_array(mysqli_query($con,"select city_id from city where city_name='$city_name'"));
            $city_id = $city['city_id'];
            $position = mysqli_fetch_array(mysqli_query($con,"select position_id from position_old where position_name='$position_name'"));
            $position_id = $position['position_id'];
            move_uploaded_file($image_tmp,"../../image/therapist/$image");
			$insert_therapist = "insert into therapist (city_id,city_name,position_id,position_name,name,image,email,mobile,experience) values ('$city_id','$city_name','$position_id','$position_name','$name','$image','$email','$mobile','$experience')";
			$run_therapist = mysqli_query($con,$insert_therapist);
			echo "<script>alert('Therapist Has Been Added Successfully')</script>";
			echo "<script>window.open('./home.php?therapist','_self')</script>";
		}
	}
?>