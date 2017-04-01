<?php
    if(isset($_GET['ev']))
    {
        $edit_id = $_GET['ev'];
        $run_therapist = mysqli_query($con,"select * from therapist where id='$edit_id'");
        while($row_therapist = mysqli_fetch_array($run_therapist))
        {
            $id = $row_therapist['id'];
            $cityname = $row_therapist['city_name'];
            $positionname = $row_therapist['position_name'];
            $name = $row_therapist['name'];
            $image = $row_therapist['image'];
            $email = $row_therapist['email'];
            $mobile = $row_therapist['mobile'];
            $experience = $row_therapist['experience'];
        }
    }
?>
    <form action="./home.php?edit_therapist&ev=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <span>City - </span>
                </td>
                <td>
                    <div class="mdl-selectfield mdl-js-selectfield">
                        <select class="mdl-selectfield__select" id="city" name="city">
                        <?php
                            $run_city = mysqli_query($con,"select * from city");
                            while($row_city = mysqli_fetch_array($run_city))
                            {
                                $city_name = $row_city['city_name'];
                                if($city_name==$cityname)
                                    echo "<option value='$city_name' selected>$city_name</option>";
                                else
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
                            $run_position = mysqli_query($con,"select * from position_old");
                            while($row_position = mysqli_fetch_array($run_position))
                            {
                                $position_name = $row_position['position_name'];
                                if($position_name==$positionname)
                                    echo "<option value='$position_name' selected>$position_name</option>";
                                else
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
                        <textarea name="name" class="mdl-textfield__input" rows="2" type="text" id="name"><?php echo $name; ?></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Image - </span>
                </td>
                <td>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input name="image" class="mdl-textfield__input" type="file" id="image"><img src="../../image/therapist/<?php echo $image; ?>" width="60" height="60" />
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Email - </span>
                </td>
                <td>
                    <div class="mdl-textfield mdl-js-textfield">
                        <textarea name="email" class="mdl-textfield__input" rows="2" type="text" id="email"><?php echo $email; ?></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Mobile - </span>
                </td>
                <td>
                    <div class="mdl-textfield mdl-js-textfield">
                        <textarea name="mobile" class="mdl-textfield__input" rows="2" type="text" id="mobile"><?php echo $mobile; ?></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Experience - </span>
                </td>
                <td>
                    <div class="mdl-textfield mdl-js-textfield">
                        <textarea name="experience" class="mdl-textfield__input" rows="2" type="text" id="experience"><?php echo $experience; ?></textarea>
                    </div>
                </td>
            </tr>
            <tr style="text-align:center;">
                <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="edit_therapist">Add</button></td>
            </tr>
        </table>
    </form>
    <?php
	if(isset($_POST['edit_therapist']))
	{
        $edit_id = $_GET['ev'];
        $city_name = $_POST['city'];
        $position_name = $_POST['position'];
        $name = $_POST['name'];
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension'];
		$image_tmp = $_FILES['image']['tmp_name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $experience = $_POST['experience'];
		if($city_name=='' OR $position_name=='' OR $name==''OR $email=='' OR mobile=='' OR experience=='')
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
            if(mysqli_num_rows(mysqli_query($con,"select * from position where city_id='$city_id' and position_id='$position_id'")) == 0)
                mysqli_query($con,"insert into position (city_id,city_name,position_id,position_name) values ('$city_id','$city_name','$position_id','$position_name')");
            $newname = "$edit_id.$ext";
            move_uploaded_file($image_tmp,"../../image/therapist/$newname");
			mysqli_query($con,"update therapist set city_id='$city_id', city_name='$city_name', position_id='$position_id', position_name='$position_name', name='$name', image='$newname', email='$email', mobile='$mobile', experience='$experience' where id='$edit_id'");
			echo "<script>alert('Therapist Has Been Edited Successfully')</script><script>window.open('./home.php?therapist','_self')</script>";
		}
	}
?>