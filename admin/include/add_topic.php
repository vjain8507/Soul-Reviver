<?php include("tinymce.php"); ?>
<form action="./home.php?add_topic" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <span>Title - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="title" class="mdl-textfield__input" rows="2" type="text" id="title"></textarea>
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
                <span>Author - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="author" class="mdl-textfield__input" rows="2" type="text" id="author"></textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Date - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <input name="date" class="mdl-textfield__input" type="date" id="date">
                    <label class="mdl-textfield__label" for="date"></label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Content - </span>
            </td>
            <td>
                <textarea name="content" rows="2" type="text" id="content"></textarea>
            </td>
        </tr>
        <tr style="text-align:center;">
            <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="add_topic">Add</button></td>
        </tr>
    </table>
</form>
<?php
	if(isset($_POST['add_topic']))
	{
        $heading = $_POST['title'];
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension'];
		$image_tmp = $_FILES['image']['tmp_name'];
        $author = $_POST['author'];
        $date = (string)date('F d, Y', strtotime($_POST['date']));
        $content = $_POST['content'];
		if($heading=='' OR $info=='' OR $author=='' OR $date==''OR $content=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
			mysqli_query($con,"insert into ttopic (heading,author,date,content) values ('$heading','$author','$date','$content')");
            $last_sno = mysqli_fetch_array(mysqli_query($con,"SELECT sno FROM ttopic ORDER BY sno DESC LIMIT 1"));
            $get_sno = $last_sno['sno'];
            $newname = "$get_sno.$ext";
            move_uploaded_file($image_tmp,"../../image/ttopics/$newname");
			mysqli_query($con,"update ttopic set image='$newname' where sno='$get_sno'");
			echo "<script>alert('Topic Has Been Added Successfully')</script><script>window.open('./home.php?ttopics','_self')</script>";
		}
	}
?>