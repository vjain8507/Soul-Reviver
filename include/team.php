<section class="team">
    <div class="container">
        <div class="who">
            <h1 class="title"><span>Our Team</span></h1>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php
                    $run_section = mysqli_query($con,"select * from section");
                    while($row_section = mysqli_fetch_array($run_section))
                    {
                        $section_id = $row_section['section_id'];
                        $section_name = $row_section['section_name'];
                        echo "<div class='col-lg-12'><h3 class='description'>$section_name</h3><div class='row pt-md'>";
                        $run_team =mysqli_query($con,"select * from team where section_id='$section_id'");
                        while($row_team = mysqli_fetch_array($run_team))
                        {
                            $section_id = $row_team['section_id'];
                            $section_name = $row_team['section_name'];
                            $post = $row_team['post'];
                            $name = $row_team['name'];
                            $image = $row_team['image'];
                            $email = $row_team['email'];
                            $mobile = $row_team['mobile'];
                            echo "<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12 profile'><div><img src='image/team/$image' class='img-responsive'></div><h1>$name</h1><h2>$post</h2><h2>$email</h2><h2>$mobile</h2></div>";
                        }
                        echo "</div></div>";
                    }
                ?>
            </div>
        </div>
    </div>
</section>