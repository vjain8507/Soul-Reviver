<form action="./home.php?add_team" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <span>Section - </span>
            </td>
            <td>
                <div class="mdl-selectfield mdl-js-selectfield">
                    <select class="mdl-selectfield__select" id="section" name="section">
                        <option selected disabled hidden>Select</option>
                        <?php
                            $run_section = mysqli_query($con,"select * from section");
                            $i=1;
                            while($row_section = mysqli_fetch_array($run_section))
                            {
                                $section_name = $row_section['section_name'];
                                echo "<option value='$section_name'>$section_name</option>";
                            }
                        ?>
                    </select>
                    <label class="mdl-selectfield__label" for="category"></label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Post - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="post" class="mdl-textfield__input" rows="2" type="text" id="post"></textarea>
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
        <tr style="text-align:center;">
            <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="add_team">Add</button></td>
        </tr>
    </table>
</form>
<?php
	if(isset($_POST['add_team']))
	{
        $section_name = $_POST['section'];
        $post = $_POST['post'];
        $name = $_POST['name'];
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension'];
		$image_tmp = $_FILES['image']['tmp_name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
		if($section_name=='' OR $name=='' OR $email=='' OR $mobile=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
            $section = mysqli_fetch_array(mysqli_query($con,"select section_id from section where section_name='$section_name'"));
            $section_id = $section['section_id'];
			mysqli_query($con,"insert into team (section_id,section_name,post,name,email,mobile) values ('$section_id','$section_name','$post','$name','$email','$mobile')");
            $last_sno = mysqli_fetch_array(mysqli_query($con,"SELECT id FROM team ORDER BY id DESC LIMIT 1"));
            $get_sno = $last_sno['id'];
            $newname = "$get_sno.$ext";
            move_uploaded_file($image_tmp,"../../image/team/$newname");
			mysqli_query($con,"update team set image='$newname' where id='$get_sno'");
			echo "<script>alert('Team Member Has Been Added Successfully')</script><script>window.open('./home.php?team','_self')</script>";
		}
	}
?>