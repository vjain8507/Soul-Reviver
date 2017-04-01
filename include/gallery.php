<?php
    echo "<section class='container'><div class='who' style='padding-top:150px;'><h1><span>GALLERY</span></h1></div>";
    $run_query = mysqli_query($con,"select * from gallery");
    if(mysqli_num_rows($run_query) != 0)
    {
        echo "<div class='row gal-container'>";
        while($row_g = mysqli_fetch_array($run_query))
        {
            $sno = $row_g['sno'];
            $imgname = $row_g['imgname'];
            echo "<div class='col-md-4 col-sm-6 co-xs-12 gal-item'><div class='box'><a style='cursor:pointer;' data-toggle='modal' data-target='#$sno'><img class='img-responsive' src='image/gallery/$imgname'></a><div class='modal fade' id='$sno' tabindex='-1' role='dialog'><div class='modal-dialog' role='document'><div><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button><div class='modal-body'><img  class='img-responsive' src='image/gallery/$imgname'></div></div></div></div></div></div>";
        }
        echo "</div>";
    }
    else
        echo "<p class='tabd'>No Photos Yet...</p>";
    echo "</section>";
?>