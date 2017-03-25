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
        <tr colspan="2" style="text-align:center;">
            <td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="add_event">Add</button></td>
        </tr>
    </table>
</form>
<?php
	if(isset($_POST['add_event']))
	{
        include("connect.php");
        $event_title = $_POST['title'];
        $event_image = $_FILES['image']['name'];
		$event_image_tmp = $_FILES['image']['tmp_name'];
        $event_date = (string)date('F d, Y', strtotime($_POST['date']));
        $event_time = (string)date('h:i A', strtotime($_POST['time']));
        $event_venue = $_POST['venue'];
        $event_cord = $_POST['cord'];
        $event_detail = $_POST['content'];
		if($event_title=='' OR $event_image=='' OR $event_date=='' OR $event_time=='' OR $event_venue=='' OR $event_cord=='' OR $event_detail=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
            move_uploaded_file($event_image_tmp,"../../image/news-events/$event_image");
			$insert_event = "insert into nevent (event_title,event_image,event_date,event_time,event_venue,event_cord,event_detail) values ('$event_title','$event_image','$event_date','$event_time','$event_venue','$event_cord','$event_detail')";
			$run_event = mysqli_query($con,$insert_event);
			echo "<script>alert('News/Event Has Been Added Successfully')</script>";
			echo "<script>window.open('./home.php?news-events','_self')</script>";
		}
	}
?>