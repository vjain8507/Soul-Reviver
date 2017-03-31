<?php include("connect.php"); ?>
<div style="text-align:center;"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?add_event';">Add Event</button></div><br>
<table>
    <col width="62px">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Title</th>
            <th>Image</th>
            <th>Date</th>
            <th>Time</th>
            <th>Venue</th>
            <th>Coordinator</th>
            <th>Detail</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $get_event = "select * from nevent order by event_id desc";
            $run_event = mysqli_query($con,$get_event);
            $i=1;
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
                echo "<tr><td>".$i++."</td><td>$event_title</td><td><img src='../../image/nevents/$event_image' height='100px' width='100px'></td><td>$event_date</td><td>$event_time</td><td>$event_venue</td><td>$event_cord</td><td>$event_detail</td><td><a href='./home.php?edit_event&ev=$event_id'><i class='material-icons'>mode_edit</i></a></td><td><a href='./home.php?delete_event&de=$event_id'><i class='material-icons'>delete_forever</i></a></td></tr>";
            }
        ?>
    </tbody>
</table>
