<?php
    include("include/connect.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
          <?php include("./include/css.php"); ?>
    </head>
    <body>
        <?php include("./include/header.php"); ?>
        <?php
            if(isset($_GET['about']))
            {
                include("include/about.php");
            }
            else if(isset($_GET['therapist']))
            {
                include("include/therapist.php");
            }
            else if(isset($_GET['team']))
            {
                include("include/team.php");
            }
            else if(isset($_GET['gallery']))
            {
                include("include/gallery.php");
            }
            else if(isset($_GET['blog']))
            {
                include("include/blog.php");
            }
            else if(isset($_GET['study']))
            {
                include("include/study.php");
            }
            else if(isset($_GET['contact']))
            {
                include("include/contact.php");
            }
            else if(isset($_GET['ttopics']))
            {
                include("include/ottopics.php");
            }
            else if(isset($_GET['nevents']))
            {
                include("include/nevents.php");
            }
            else if(isset($_GET['signin']))
            {
                include("include/signin.php");
            }
            else if(isset($_GET['signup']))
            {
                include("include/signup.php");
            }
            else if(isset($_GET['account']))
            {
                include("include/account.php");
            }
            else if(isset($_GET['edit_detail']))
            {
                include("include/edit_detail.php");
            }
            else if(isset($_GET['logout']))
            {
                include("include/logout.php");
            }
            else
            {
                
                include("include/slider.php");
                include("include/services.php");
                include("include/ttopics.php");
                include("include/news-events.php");
                include("include/ad.php");
            }
        ?>
        <?php include("include/footer.php"); ?>
    </body>
</html>