<?php
	session_start();
	if(!$_SESSION['uname'])
	{
		header("Location: ../");
	}
?>
<!doctype html>
<html lang="en">
    <head>
        <?php include("rheader.php"); ?>
        <title>Home</title>
        <style>
            table{border-collapse:collapse;}
            td,th{border:1px solid #37474F;padding:10px;}
            th{background-color:#37474F;color:#FFFFFF;text-align:center;}
        </style>
    </head>
    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <header class="demo-header mdl-layout__header mdl-color--grey-100 ">
                <div class="mdl-layout__header-row">
                    <span class="mdl-layout-title">Home</span>
                </div>
            </header>
            <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
                <header class="demo-drawer-header">
                    <img src="../images/user.jpg" class="demo-avatar">
                    <h4>Administrator</h4>
                </header>
                <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
                    <a class="mdl-navigation__link" href="home.php"><i class="material-icons">home</i>Home</a>
                    <a class="mdl-navigation__link" href="home.php?ttopics"><i class="material-icons">trending_up</i>Trending Topic</a>
                    <a class="mdl-navigation__link" href="home.php?news-events"><i class="material-icons">event</i>News & Event</a>
                    <a class="mdl-navigation__link" href="home.php?therapist"><i class="material-icons">person_pin</i>Therapist</a>
                    <a class="mdl-navigation__link" href="home.php?section"><i class="material-icons">view_list</i>Section</a>
                    <a class="mdl-navigation__link" href="home.php?team"><i class="material-icons">group</i>Team</a>
                    <a class="mdl-navigation__link" href="home.php?category"><i class="material-icons">list</i>Category</a>
                    <a class="mdl-navigation__link" href="home.php?post"><i class="material-icons">assignment</i>Post</a>
                    <a class="mdl-navigation__link" href="home.php?gallery"><i class="material-icons">add_a_photo</i>Gallery</a>
                    <a class="mdl-navigation__link" href="home.php?ad"><i class="material-icons">chrome_reader_mode</i>Ad</a>
                    <a class="mdl-navigation__link" href="home.php?logout"><i class="material-icons">exit_to_app</i>Logout</a>
                    <div class="mdl-layout-spacer"></div>
                    <div style="text-align:center;">
                        <p style="margin-bottom:0px;user-select:none;">Developed By <a style="color:inherit;text-decoration:inherit;font-weight:normal;" href="http://zhash.tech/">zhash.tech</a></p>
                        <span style="color:gray;user-select:none;cursor:default;">v1.0</span>
                    </div>
                </nav>
            </div>
            <main class="mdl-layout__content">
                <div class="mdl-grid">
                    <div class="mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
                    <div class="demo-content mdl-color--blue-grey-100 mdl-shadow--8dp content mdl-color-text--grey-800">
                        <?php
                            if(isset($_GET['logout']))
                            {
                                include("logout.php");
                            }
                            else if(isset($_GET['ttopics']))
                            {
                                include("ttopics.php");
                            }
                            else if(isset($_GET['add_topic']))
                            {
                                include("add_topic.php");
                            }
                            else if(isset($_GET['edit_topic']))
                            {
                                include("edit_topic.php");
                            }
                            else if(isset($_GET['delete_topic']))
                            {
                                include("delete_topic.php");
                            }
                            else if(isset($_GET['news-events']))
                            {
                                include("news-events.php");
                            }
                            else if(isset($_GET['add_event']))
                            {
                                include("add_event.php");
                            }
                            else if(isset($_GET['edit_event']))
                            {
                                include("edit_event.php");
                            }
                            else if(isset($_GET['delete_event']))
                            {
                                include("delete_event.php");
                            }
                            else if(isset($_GET['therapist']))
                            {
                                include("therapist.php");
                            }
                            else if(isset($_GET['add_therapist']))
                            {
                                include("add_therapist.php");
                            }
                            else if(isset($_GET['edit_therapist']))
                            {
                                include("edit_therapist.php");
                            }
                            else if(isset($_GET['delete_therapist']))
                            {
                                include("delete_therapist.php");
                            }
                            else if(isset($_GET['section']))
                            {
                                include("section.php");
                            }
                            else if(isset($_GET['team']))
                            {
                                include("team.php");
                            }
                            else if(isset($_GET['category']))
                            {
                                include("category.php");
                            }
                            else if(isset($_GET['add_cat']))
                            {
                                include("add_cat.php");
                            }
                            else if(isset($_GET['edit_cat']))
                            {
                                include("edit_cat.php");
                            }
                            else if(isset($_GET['delete_cat']))
                            {
                                include("delete_cat.php");
                            }
                            else if(isset($_GET['post']))
                            {
                                include("post.php");
                            }
                            else if(isset($_GET['add_post']))
                            {
                                include("add_post.php");
                            }
                            else if(isset($_GET['edit_post']))
                            {
                                include("edit_post.php");
                            }
                            else if(isset($_GET['delete_post']))
                            {
                                include("delete_post.php");
                            }
                            else if(isset($_GET['gallery']))
                            {
                                include("gallery.php");
                            }
                            else if(isset($_GET['ad']))
                            {
                                include("ad.php");
                            }
                            else if(isset($_GET['set_ad']))
                            {
                                include("set_ad.php");
                            }
                            else if(isset($_GET['delete_ad']))
                            {
                                include("delete_ad.php");
                            }
                            else
                            {
                                echo"<h1>Welcome</h1>";
                            }
                        ?>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>