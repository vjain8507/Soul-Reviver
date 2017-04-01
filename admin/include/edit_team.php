<?php
    if(isset($_GET['ev']))
    {
        $edit_id = $_GET['ev'];
        $run_team = mysqli_query($con,"select * from team where id='$edit_id'");
        while($row_team = mysqli_fetch_array($run_team))
        {
            $id = $row_team['id'];
            $sectionname = $row_team['section_name'];
            $post = $row_team['post'];
            $name = $row_team['name'];
            $image = $row_team['image'];
            $email = $row_team['email'];
            $mobile = $row_team['mobile'];
        }
    }
?>
    <form action="./home.php?edit_team&ev=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
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
                                if($section_name==$sectionname)
                                    echo "<option value='$section_name' selected>$section_name</option>";
                                else
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
                        <textarea name="post" class="mdl-textfield__input" rows="2" type="text" id="post"><?php echo $post; ?></textarea>
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
                        <input name="image" class="mdl-textfield__input" type="file" id="image"><img src="../../image/team/<?php echo $image; ?>" width="60" height="60" />
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
            <tr style="text-align:center;">
                <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="edit_team">Add</button></td>
            </tr>
        </table>
    </form>
    <?php
	if(isset($_POST['edit_team']))
	{
        $edit_id = $_GET['ev'];
        $section_name = $_POST['section'];
        $post = $_POST['post'];
        $name = $_POST['name'];
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension'];
		$image_tmp = $_FILES['image']['tmp_name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
		if($section_name=='' OR $name==''OR $email=='' OR mobile=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
            $section = mysqli_fetch_array(mysqli_query($con,"select section_id from section where section_name='$section_name'"));
            $section_id = $section['section_id'];
            $newname = "$edit_id.$ext";
            move_uploaded_file($image_tmp,"../../image/team/$newname");
			mysqli_query($con,"update team set section_id='$section_id', section_name='$section_name', post='$post', name='$name', image='$newname', email='$email', mobile='$mobile' where id='$edit_id'");
			echo "<script>alert('Team Member Has Been Edited Successfully.')</script><script>window.open('./home.php?team','_self')</script>";
		}
	}
?>