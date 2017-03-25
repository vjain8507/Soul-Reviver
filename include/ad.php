<?php
    $get_ad = "select ad_image from ad where ad_status=1";
    $run_ad = mysqli_query($con,$get_ad);
    $row_ad = mysqli_fetch_array($run_ad);
    $ad_image = $row_ad['ad_image'];
    echo "<div class='container' style='text-align:center;'><section class='ads'><div class='image-bg-fluid-height'><img class='img-responsive' src='image/ads/$ad_image' alt='ad'></div></section></div>";
?>