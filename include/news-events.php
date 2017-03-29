<?php
    include("include/connect.php");
    $get_event = "select * from nevent order by event_id desc limit 4";
    $run_event = mysqli_query($con,$get_event);
    if(mysqli_num_rows($run_event) != 0)
    {
        echo "<section style='margin-bottom:50px;'><div class='sp who container'><h1 class='title'><span>News & Events</span></h1></div><div class='container'><div class='row'>";
        while($row_event = mysqli_fetch_array($run_event))
        {
            $event_id = $row_event['event_id'];
            $event_title = $row_event['event_title'];
            $event_image = $row_event['event_image'];
            $event_date = $row_event['event_date'];
            $event_time = $row_event['event_time'];
            $event_venue = $row_event['event_venue'];
            $event_cord = $row_event['event_cord'];
            $event_detail = word_count($row_event['event_detail'], 50);
            echo "<div class='col-lg-3 col-md-6 col-sm-6'><div class='single_pricelist'><div class='single_pricelist_content'><h1>$event_title</h1><img style='width:200px;height:200px;margin-bottom:15px;' src='image/nevents/$event_image'><p style='text-align:center;'><i class='fa fa-calendar'></i>$event_date</p><p style='text-align:center;'><i class='fa fa-clock-o'></i>$event_time</p><p style='text-align:center;'><i class='fa fa-map-marker'></i>$event_venue</p><p style='text-align:center;'><i class='fa fa-users'></i>$event_cord</p><p>$event_detail</p><a href='./?nevents&s=$event_id'>Read More</a></div></div></div>";
        }
        echo "</div></div></section>";
    }
?>
