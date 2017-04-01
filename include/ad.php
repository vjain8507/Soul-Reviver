<?php
    $row_ad = mysqli_fetch_array(mysqli_query($con,"select ad_image from ad where ad_status=1"));
    $ad_image = $row_ad['ad_image'];
    echo "<div class='container' style='text-align:center;'><section class='ads'><div class='image-bg-fluid-height'><img class='img-responsive' src='image/ads/$ad_image' alt='ad'></div></section></div>";
?>
