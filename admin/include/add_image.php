<form action="./home.php?add_image" method="post" enctype="multipart/form-data">
    <table>
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
        <tr style="text-align:center;">
            <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="add_image">Add</button></td>
        </tr>
    </table>
</form>
<?php
	if(isset($_POST['add_image']))
	{
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension'];
		$image_tmp = $_FILES['image']['tmp_name'];
        mysqli_query($con,"insert into gallery (imgname) values ('null')");
        $last_sno = mysqli_fetch_array(mysqli_query($con,"SELECT sno FROM gallery ORDER BY sno DESC LIMIT 1"));
        $get_sno = $last_sno['sno'];
        $newname = "$get_sno.$ext";
        move_uploaded_file($image_tmp,"../../image/gallery/$newname");
        mysqli_query($con,"update gallery set imgname='$newname' where sno='$get_sno'");
        echo "<script>alert('Image Has Been Added Successfully')</script><script>window.open('./home.php?gallery','_self')</script>";
	}
?>