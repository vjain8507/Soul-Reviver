<?php include("include/connect.php"); ?>
<div class="container">
    <?php
        if(!isset($_SESSION['username']))
        {
            echo "<div id='tabs' class='tabs'><div class='who'><h1 class='title'><span>Find Therapist</span></h1></div></div>";
            echo "<p class='tabd'><a href='./?signin'>Sign In</a> Or <a href='./?signup'>Sign Up</a> To Continue.</p>";
        }
        else if(isset($_GET['c']) && isset($_GET['p']))
        {
            $city = $_GET['c'];
            $position = $_GET['p'];
            $get_pos = "select * from position where position_id = $position";
            $run_pos = mysqli_query($con,$get_pos);
            $row_pos = mysqli_fetch_array($run_pos);
            $rpos = $row_pos['position_name'];
            echo "<div class='who' style='padding-top:120px;'><h1 class='title'><span>$rpos</span></h1></div><div class='row'>";
            $get_therapist = "select * from therapist where city_id = $city and position_id = $position";
            $run_therapist = mysqli_query($con,$get_therapist);
            while($row_therapist = mysqli_fetch_array($run_therapist))
            {
                $name = $row_therapist['name'];
                $image = $row_therapist['image'];
                $email = $row_therapist['email'];
                $mobile = $row_therapist['mobile'];
                $experience = $row_therapist['experience'];
                echo "<div class='col-xs-12 col-sm-6 col-md-6'><div class='well well-sm'><div class='row'><div class='col-sm-6 col-md-4'><img src='image/therapist/$image' alt='' class='img-rounded img-responsive'/></div><div class='col-sm-6 col-md-8'><h4>$name</h4><p><strong>Email: </strong>$email</p><p><strong>Mobile: </strong>+91-$mobile</p><p><strong>Experiance: </strong>$experience</p><div class='btn-group'><button type='button' class='btn btn-primary'>Video Call</button></div></div></div></div></div>";
            }
            echo "</div>";
        }
        else
        {
            echo "<div id='tabs' class='tabs'><div class='who'><h1 class='title'><span>Find Therapist</span></h1></div><nav><ul>";
            $get_city = "select * from city";
            $run_city = mysqli_query($con,$get_city);
            while($row_city = mysqli_fetch_array($run_city))
            {
                $city_id = $row_city['city_id'];
                $city_name = $row_city['city_name'];
                echo "<li><a href='section$city_id'><span>$city_name</span></a></li>";
            }
            echo "</ul></nav><div class='content'>";
            $get_city1 = "select * from city";
            $run_city1 = mysqli_query($con,$get_city1);
            while($row_city1 = mysqli_fetch_array($run_city1))
            {
                $cityid = $row_city1['city_id'];
                $cityname = $row_city1['city_name'];
                echo "<section id='section$cityid'><div class='row'>";
                $get_position = "select * from position where city_id = $cityid";
                $run_position = mysqli_query($con,$get_position);
                while($row_position = mysqli_fetch_array($run_position))
                {
                    $position_id = $row_position['position_id'];
                    $position_name = $row_position['position_name'];
                    echo "<div class='col-xs-12 col-sm-6 col-md-3 rwrapper'><a href='./?therapist&c=$cityid&p=$position_id'><div class='rlisting'><div class='col-md-12 nopad'><img src='image/others/250x250.png' class='img-responsive'></div><div class='col-md-12 nopad sp'><h4 style='padding-left:15px;'>$position_name</h4></div></div></a></div>";
                }
                echo "</div></section>";
            }
            echo "</div></div>";
        }
    ?>
</div>
