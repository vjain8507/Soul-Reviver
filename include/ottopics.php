<style>
    .ttpanel a{
        display:block;
        padding:10px 15px;
        margin:-10px -15px;
    }
    hr{
        color: #000;
        background-color: #000;
        height: 1px;
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
    $get_topic = "select * from ttopic order by sno desc";
    $run_topic = mysqli_query($con,$get_topic);
    echo "<div class='container' style='margin-top:160px;'><div class='who'><h1 class='title'><span>Trending Topics</span></h1></div><div class='panel-group' id='accordion' style='color:#000;'>";
    $i=0;
    while($row_topic = mysqli_fetch_array($run_topic))
    {
        $i = $i+1;
        $sno = $row_topic['sno'];
        $heading = $row_topic['heading'];
        $image = $row_topic['image'];
        $author = $row_topic['author'];
        $date = $row_topic['date'];
        $content = $row_topic['content'];
        echo "<div class='panel panel-default ttpanel'><div class='panel-heading'><h4 class='panel-title'><a data-toggle='collapse' data-parent='#accordion' href='#$sno'>$i. $heading</a></h4></div><div id='$sno' class='panel-collapse collapse'><div class='panel-body'><p style='text-align:center;'><img src='image/ttopics/$image'/></p><hr><p style='text-align:center;font-size:20px;'><i class='fa fa-user'></i>$author<i class='fa fa-calendar fae'></i>$date</p><hr><div style='text-align:justify;font-size:20px;'>$content</div></div></div></div>";
    }
    echo "</div></div>";
?>