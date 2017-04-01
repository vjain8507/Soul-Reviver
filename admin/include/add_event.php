<?php include("tinymce.php"); ?>
<form action="./home.php?add_event" method="post" enctype="multipart/form-data">
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
                <span>Time - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <input name="time" class="mdl-textfield__input" type="time" id="time">
                    <label class="mdl-textfield__label" for="time"></label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Venue - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="venue" class="mdl-textfield__input" rows="2" type="text" id="venue"></textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Coordinator - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="cord" class="mdl-textfield__input" rows="2" type="text" id="cord"></textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Detail - </span>
            </td>
            <td>
                <textarea name="content" rows="2" type="text" id="content"></textarea>
            </td>
        </tr>
        <tr style="text-align:center;">
            <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="add_event">Add</button></td>
        </tr>
    </table>
</form>
<?php
	if(isset($_POST['add_event']))
	{
        $event_title = $_POST['title'];
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension'];
		$event_image_tmp = $_FILES['image']['tmp_name'];
        $event_date = (string)date('F d, Y', strtotime($_POST['date']));
        $event_time = (string)date('h:i A', strtotime($_POST['time']));
        $event_venue = $_POST['venue'];
        $event_cord = $_POST['cord'];
        $event_detail = $_POST['content'];
		if($event_title=='' OR $event_date=='' OR $event_time=='' OR $event_venue=='' OR $event_cord=='' OR $event_detail=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
			mysqli_query($con,"insert into nevent (event_title,event_date,event_time,event_venue,event_cord,event_detail) values ('$event_title','$event_date','$event_time','$event_venue','$event_cord','$event_detail')");
            $last_sno = mysqli_fetch_array(mysqli_query($con,"SELECT event_id FROM nevent ORDER BY event_id DESC LIMIT 1"));
            $get_sno = $last_sno['event_id'];
            $newname = "$get_sno.$ext";
            move_uploaded_file($event_image_tmp,"../../image/nevents/$newname");
			mysqli_query($con,"update nevent set event_image='$newname' where event_id='$get_sno'");
			echo "<script>alert('News/Event Has Been Added Successfully')</script><script>window.open('./home.php?news-events','_self')</script>";
		}
	}
?>