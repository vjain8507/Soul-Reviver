<?php
    include("connect.php");
    if(isset($_GET['ev']))
    {
        $edit_id = $_GET['ev'];
        $get_topic = "select * from ttopic where sno='$edit_id'";
        $run_topic = mysqli_query($con,$get_topic);
        while($row_topic = mysqli_fetch_array($run_topic))
        {
            $sno = $row_topic['sno'];
            $heading = $row_topic['heading'];
            $image = $row_topic['image'];
            $author = $row_topic['author'];
            $date = $row_topic['date'];
            $content = $row_topic['content'];
        }
    }
?>
    <?php include("tinymce.php"); ?>
    <form action="./home.php?edit_topic&ev=<?php echo $sno; ?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <span>Title - </span>
                </td>
                <td>
                    <div class="mdl-textfield mdl-js-textfield">
                        <textarea name="title" class="mdl-textfield__input" rows="2" type="text" id="title"><?php echo $heading ?></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Image - </span>
                </td>
                <td>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input name="image" class="mdl-textfield__input" type="file" id="image"><img src="../../image/ttopics/<?php echo $image; ?>" width="60" height="60" />
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Author - </span>
                </td>
                <td>
                    <div class="mdl-textfield mdl-js-textfield">
                        <textarea name="author" class="mdl-textfield__input" rows="2" type="text" id="author"><?php echo $author ?></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Date - </span>
                </td>
                <td>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input name="date" value="<?php echo date('Y-m-d', strtotime($date)); ?>" class="mdl-textfield__input" type="date" id="date">
                        <label class="mdl-textfield__label" for="date"></label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Content - </span>
                </td>
                <td>
                    <textarea name="content" rows="2" type="text" id="content"><?php echo $content; ?></textarea>
                </td>
            </tr>
            <tr style="text-align:center;">
                <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="edit_topic">Add</button></td>
            </tr>
        </table>
    </form>
    <?php
	if(isset($_POST['edit_topic']))
	{
        $edit_id = $_GET['ev'];
        $heading = $_POST['title'];
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension'];
		$image_tmp = $_FILES['image']['tmp_name'];
        $author = $_POST['author'];
        $date = (string)date('F d, Y', strtotime($_POST['date']));
        $content = $_POST['content'];
		if($heading=='' OR $author=='' OR $date==''OR $content=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
            $newname = "$edit_id.$ext";
            move_uploaded_file($image_tmp,"../../image/ttopics/$newname");
			$update_topic = "update ttopic set heading='$heading', image='$newname', author='$author', date='$date', content='$content' where sno='$edit_id'";
			mysqli_query($con,$update_topic);
			echo "<script>alert('Topic Has Been Added Successfully')</script>";
			echo "<script>window.open('./home.php?ttopics','_self')</script>";
		}
	}
?>
