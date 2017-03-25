<style>
    .ttpanel a{
        display:block;
        padding:10px 15px;
        margin:-10px -15px;
    }
    hr{
        color:#000;
        background-color:#000;
        height:1px;
    }
    .ttpanel h4{
        font-size:25px;
    }
    .ttpanel img{
        height:200px;
    }
    .ttpanel i{
        padding-right:5px;
    }
    .panel-body{
        padding:50px;
    }
    .fae{
        padding-left:30px;
    }
</style>
<?php
    include("include/connect.php");
    $get_event = "select * from nevent order by event_id desc";
    $run_event = mysqli_query($con,$get_event);
    echo "<div class='container' style='margin-top:160px;'><div class='who'><h1 class='title'><span>News & Events</span></h1></div><div class='panel-group' id='accordion' style='color:#000;'>";
    $i=0;
    while($row_event = mysqli_fetch_array($run_event))
    {
        $i = $i+1;
        $event_id = $row_event['event_id'];
        $event_title = $row_event['event_title'];
        $event_image = $row_event['event_image'];
        $event_date = $row_event['event_date'];
        $event_time = $row_event['event_time'];
        $event_venue = $row_event['event_venue'];
        $event_cord = $row_event['event_cord'];
        $event_detail = $row_event['event_detail'];
        echo "<div class='panel panel-default ttpanel'><div class='panel-heading'><h4 class='panel-title'><a data-toggle='collapse' data-parent='#accordion' href='#$event_id'>$i. $event_title</a></h4></div><div id='$event_id' class='panel-collapse collapse'><div class='panel-body'><p style='text-align:center;'><img src='image/news-events/$event_image'/></p><hr><p style='text-align:center;font-size:20px;line-height:2em;'><i class='fa fa-calendar'></i>$event_date<i class='fa fa-clock-o fae'></i>$event_time<i class='fa fa-map-marker fae'></i>$event_venue<br><i class='fa fa-users'></i>$event_cord</p><hr><div style='text-align:justify;font-size:20px;'>$event_detail</div></div></div></div>";
    }
    echo "</div></div>";
?>