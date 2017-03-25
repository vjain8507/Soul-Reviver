<?php
    include("include/connect.php");
    include("include/functions.php");
    $get_topic = "select * from ttopic order by sno desc limit 4";
    $run_topic = mysqli_query($con,$get_topic);
    if(mysqli_num_rows($run_topic) > 0)
    {
        echo "<section style='margin-bottom:50px;'><div class='sp'><h1 class='title'><span>Trending Topics</span></h1></div><div class='container'><div class='row'>";
        while($row_topic = mysqli_fetch_array($run_topic))
        {
            $sno = $row_topic['sno'];
            $heading = $row_topic['heading'];
            $image = $row_topic['image'];
            $author = $row_topic['author'];
            $date = $row_topic['date'];
            $content = word_count($row_topic['content'], 50);
            echo "<div class='col-lg-3 col-md-6 col-sm-6'><div class='single_pricelist'><div class='single_pricelist_content'><h1 class='reshead'>$heading</h1><img style='width:200px;height:200px;margin-bottom:15px;' src='image/ttopics/$image'><p style='text-align:center;'><i class='fa fa-user'></i>$author</p><p style='text-align:center;'><i class='fa fa-calendar'></i>$date</p><p>$content</p><a href='./?ttopics&s=$sno'>Read More</a></div></div></div>";
        }
        echo "</div></div></section>";
    }
?>