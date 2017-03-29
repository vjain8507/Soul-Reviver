<?php
    include("connect.php");
    if(isset($_GET['ev']))
    {
        $edit_id = $_GET['ev'];
        $get_event = "select * from nevent where event_id='$edit_id'";
        $run_event = mysqli_query($con,$get_event);
        while($row_event = mysqli_fetch_array($run_event))
        {
            $event_id = $row_event['event_id'];
            $event_title = $row_event['event_title'];
            $event_image = $row_event['event_image'];
            $event_date = $row_event['event_date'];
            $event_time = $row_event['event_time'];
            $event_venue = $row_event['event_venue'];
            $event_cord = $row_event['event_cord'];
            $event_detail = $row_event['event_detail'];
        }
    }
?>
    <?php include("tinymce.php"); ?>
    <form action="./home.php?edit_event&ev=<?php echo $event_id; ?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <span>Title - </span>
                </td>
                <td>
                    <div class="mdl-textfield mdl-js-textfield">
                        <textarea name="title" class="mdl-textfield__input" rows="2" type="text" id="title"><?php echo $event_title ?></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Image - </span>
                </td>
                <td>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input name="image" class="mdl-textfield__input" type="file" id="image"><img src="../../image/nevents/<?php echo $event_image; ?>" width="60" height="60" />
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Date - </span>
                </td>
                <td>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input name="date" value="<?php echo date('Y-m-d', strtotime($event_date)); ?>" class="mdl-textfield__input" type="date" id="date">
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
                        <input name="time" value="<?php echo date('H:i', strtotime($event_time)); ?>" class="mdl-textfield__input" type="time" id="time">
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
                        <textarea name="venue" class="mdl-textfield__input" rows="2" type="text" id="venue"><?php echo $event_venue; ?></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Coordinator - </span>
                </td>
                <td>
                    <div class="mdl-textfield mdl-js-textfield">
                        <textarea name="cord" class="mdl-textfield__input" rows="2" type="text" id="cord"><?php echo $event_cord; ?></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Detail - </span>
                </td>
                <td>
                    <textarea name="content" rows="2" type="text" id="content"><?php echo $event_detail; ?></textarea>
                </td>
            </tr>
            <tr style="text-align:center;">
                <td colspan="2"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="edit_event">Add</button></td>
            </tr>
        </table>
    </form>
    <?php
	if(isset($_POST['edit_event']))
	{
        $edit_id = $_GET['ev'];
        $event_title = $_POST['title'];
        $event_date = (string)date('F d, Y', strtotime($_POST['date']));
        $event_time = (string)date('h:i A', strtotime($_POST['time']));
        $event_venue = $_POST['venue'];
        $event_cord = $_POST['cord'];
        $event_detail = $_POST['content'];
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension'];
		$event_image_tmp = $_FILES['image']['tmp_name'];
		if($event_title=='' OR $event_date=='' OR $event_time=='' OR $event_venue=='' OR $event_cord=='' OR $event_detail=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
            $newname = "$edit_id.$ext";
            move_uploaded_file($event_image_tmp,"../../image/nevents/$newname");
			$update_event = "update nevent set event_title='$event_title', event_image='$newname', event_date='$event_date', event_time='$event_time', event_venue='$event_venue', event_cord='$event_cord', event_detail='$event_detail' where event_id='$edit_id'";
			mysqli_query($con,$update_event);
			echo "<script>alert('News/Event Has Been Updated Successfully')</script>";
			echo "<script>window.open('./home.php?news-events','_self')</script>";
		}
	}
?>
