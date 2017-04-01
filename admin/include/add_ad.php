<form action="./home.php?add_ad" method="post" enctype="multipart/form-data">
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
            <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="add_ad">Add</button></td>
        </tr>
    </table>
</form>
<?php
	if(isset($_POST['add_ad']))
	{
        mysqli_query($con,"update ad set ad_status='0'");
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension'];
		$image_tmp = $_FILES['image']['tmp_name'];
        mysqli_query($con,"insert into ad (ad_image,ad_status) values ('null','1')");
        $last_sno = mysqli_fetch_array(mysqli_query($con,"SELECT ad_id FROM ad ORDER BY ad_id DESC LIMIT 1"));
        $get_sno = $last_sno['ad_id'];
        $newname = "$get_sno.$ext";
        move_uploaded_file($image_tmp,"../../image/ads/$newname");
        mysqli_query($con,"update ad set ad_image='$newname' where ad_id='$get_sno'");
        echo "<script>alert('Ad Has Been Added Successfully')</script><script>window.open('./home.php?ad','_self')</script>";
	}
?>