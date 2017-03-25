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
        <tr colspan="2" style="text-align:center;">
            <td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="add_topic">Add</button></td>
        </tr>
    </table>
</form>
<?php
	if(isset($_POST['add_topic']))
	{
        include("connect.php");
        $heading = $_POST['title'];
        $image = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];
        $author = $_POST['author'];
        $date = (string)date('F d, Y', strtotime($_POST['date']));
        $content = $_POST['content'];
		if($heading=='' OR $image=='' OR $author=='' OR $date==''OR $content=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
            move_uploaded_file($image_tmp,"../../image/ttopics/$image");
			$insert_topic = "insert into ttopic (heading,image,author,date,content) values ('$heading','$image','$author','$date','$content')";
			$run_topic = mysqli_query($con,$insert_topic);
			echo "<script>alert('Topic Has Been Added Successfully')</script>";
			echo "<script>window.open('./home.php?ttopics','_self')</script>";
		}
	}
?>