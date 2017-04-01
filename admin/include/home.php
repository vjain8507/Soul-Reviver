<?php
	session_start();
    include("connect.php");
	if(!$_SESSION['uname'])
		header("Location: ../");
?>
    <!doctype html>
    <html lang="en">

    <head>
        <?php include("rheader.php"); ?>
        <style>
            table {
                border-collapse: collapse;
            }
            
            td,
            th {
                border: 1px solid #37474F;
                padding: 10px;
            }
            
            th {
                background-color: #37474F;
                color: #FFFFFF;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <header class="demo-header mdl-layout__header mdl-color--grey-100 ">
                <div class="mdl-layout__header-row">
                    <span class="mdl-layout-title mdl-color-text--grey-800"><b>
                        <?php
                            if(isset($_GET['ttopics']))
                                echo "TREANDING TOPIC";
                            else if(isset($_GET['add_topic']))
                                echo "ADD TOPIC";
                            else if(isset($_GET['edit_topic']))
                                echo "EDIT TOPIC";
                            else if(isset($_GET['news-events']))
                                echo "NEWS & EVENT";
                            else if(isset($_GET['add_event']))
                                echo "ADD EVENT";
                            else if(isset($_GET['edit_event']))
                                echo "EDIT EVENT";
                            else if(isset($_GET['therapist']))
                                echo "THERAPIST";
                            else if(isset($_GET['city']))
                                echo "CITY";
                            else if(isset($_GET['add_city']))
                                echo "ADD CITY";
                            else if(isset($_GET['edit_city']))
                                echo "EDIT CITY";
                            else if(isset($_GET['position']))
                                echo "POSITION";
                            else if(isset($_GET['add_position']))
                                echo "ADD POSITION";
                            else if(isset($_GET['edit_position']))
                                echo "EDIT POSITION";
                            else if(isset($_GET['add_therapist']))
                                echo "ADD THERAPIST";
                            else if(isset($_GET['edit_therapist']))
                                echo "EDIT THERAPIST";
                            else if(isset($_GET['section']))
                                echo "SECTION";
                            else if(isset($_GET['add_section']))
                                echo "ADD SECTION";
                            else if(isset($_GET['edit_section']))
                                echo "EDIT SECTION";
                            else if(isset($_GET['team']))
                                echo "TEAM";
                            else if(isset($_GET['add_team']))
                                echo "ADD TEAM";
                            else if(isset($_GET['edit_team']))
                                echo "EDIT TEAM";
                            else if(isset($_GET['category']))
                                echo "CATEGORY";
                            else if(isset($_GET['add_cat']))
                                echo "ADD CATEGORY";
                            else if(isset($_GET['edit_cat']))
                                echo "EDIT CATEGORY";
                            else if(isset($_GET['post']))
                                echo "POST";
                            else if(isset($_GET['add_post']))
                                echo "ADD POST";
                            else if(isset($_GET['edit_post']))
                                echo "EDIT POST";
                            else if(isset($_GET['gallery']))
                                echo "GALLERY";
                            else if(isset($_GET['add_image']))
                                echo "ADD IMAGE";
                            else if(isset($_GET['ad']))
                                echo "ADVERTISEMENT";
                            else if(isset($_GET['add_ad']))
                                echo "ADD ADVERTISEMENT";
                            else if(isset($_GET['add_member']))
                                echo "ADD MEMBER";
                            else if(isset($_GET['users']))
                                echo "USERS";
                            else if(isset($_GET['comment']))
                                echo "COMMENTS";
                            else
                                echo"HOME";
                        ?>
                    </b></span>
                </div>
            </header>
            <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
                <header class="demo-drawer-header">
                    <img src="../images/user.jpg" class="demo-avatar">
                    <h4>
                        <?php echo $_SESSION['uname']; ?>
                    </h4>
                </header>
                <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
                    <a class="mdl-navigation__link" href="home.php"><i class="material-icons">home</i>Home</a>
                    <a class="mdl-navigation__link" href="home.php?ttopics"><i class="material-icons">trending_up</i>Trending Topic</a>
                    <a class="mdl-navigation__link" href="home.php?news-events"><i class="material-icons">event</i>News & Event</a>
                    <a class="mdl-navigation__link" href="home.php?therapist"><i class="material-icons">person_pin</i>Therapist</a>
                    <a class="mdl-navigation__link" href="home.php?team"><i class="material-icons">group</i>Team</a>
                    <a class="mdl-navigation__link" href="home.php?post"><i class="material-icons">assignment</i>Post</a>
                    <a class="mdl-navigation__link" href="home.php?gallery"><i class="material-icons">add_a_photo</i>Gallery</a>
                    <a class="mdl-navigation__link" href="home.php?ad"><i class="material-icons">chrome_reader_mode</i>Ad</a>
                    <a class="mdl-navigation__link" href="home.php?users"><i class="material-icons">sentiment_very_satisfied</i>Users</a>
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
                                include("logout.php");
                            else if(isset($_GET['ttopics']))
                                include("ttopics.php");
                            else if(isset($_GET['add_topic']))
                                include("add_topic.php");
                            else if(isset($_GET['edit_topic']))
                                include("edit_topic.php");
                            else if(isset($_GET['delete_topic']))
                                include("delete_topic.php");
                            else if(isset($_GET['news-events']))
                                include("news-events.php");
                            else if(isset($_GET['add_event']))
                                include("add_event.php");
                            else if(isset($_GET['edit_event']))
                                include("edit_event.php");
                            else if(isset($_GET['delete_event']))
                                include("delete_event.php");
                            else if(isset($_GET['therapist']))
                                include("therapist.php");
                            else if(isset($_GET['city']))
                                include("city.php");
                            else if(isset($_GET['add_city']))
                                include("add_city.php");
                            else if(isset($_GET['edit_city']))
                                include("edit_city.php");
                            else if(isset($_GET['delete_city']))
                                include("delete_city.php");
                            else if(isset($_GET['position']))
                                include("position.php");
                            else if(isset($_GET['add_position']))
                                include("add_position.php");
                            else if(isset($_GET['edit_position']))
                                include("edit_position.php");
                            else if(isset($_GET['delete_position']))
                                include("delete_position.php");
                            else if(isset($_GET['add_therapist']))
                                include("add_therapist.php");
                            else if(isset($_GET['edit_therapist']))
                                include("edit_therapist.php");
                            else if(isset($_GET['delete_therapist']))
                                include("delete_therapist.php");
                            else if(isset($_GET['section']))
                                include("section.php");
                            else if(isset($_GET['add_section']))
                                include("add_section.php");
                            else if(isset($_GET['edit_section']))
                                include("edit_section.php");
                            else if(isset($_GET['delete_section']))
                                include("delete_section.php");
                            else if(isset($_GET['team']))
                                include("team.php");
                            else if(isset($_GET['add_team']))
                                include("add_team.php");
                            else if(isset($_GET['edit_team']))
                                include("edit_team.php");
                            else if(isset($_GET['delete_team']))
                                include("delete_team.php");
                            else if(isset($_GET['category']))
                                include("category.php");
                            else if(isset($_GET['add_cat']))
                                include("add_cat.php");
                            else if(isset($_GET['edit_cat']))
                                include("edit_cat.php");
                            else if(isset($_GET['delete_cat']))
                                include("delete_cat.php");
                            else if(isset($_GET['post']))
                                include("post.php");
                            else if(isset($_GET['add_post']))
                                include("add_post.php");
                            else if(isset($_GET['edit_post']))
                                include("edit_post.php");
                            else if(isset($_GET['delete_post']))
                                include("delete_post.php");
                            else if(isset($_GET['gallery']))
                                include("gallery.php");
                            else if(isset($_GET['add_image']))
                                include("add_image.php");
                            else if(isset($_GET['delete_image']))
                                include("delete_image.php");
                            else if(isset($_GET['ad']))
                                include("ad.php");
                            else if(isset($_GET['add_ad']))
                                include("add_ad.php");
                            else if(isset($_GET['set_ad']))
                                include("set_ad.php");
                            else if(isset($_GET['delete_ad']))
                                include("delete_ad.php");
                            else if(isset($_GET['add_member']))
                                include("add_member.php");
                            else if(isset($_GET['users']))
                                include("users.php");
                            else if(isset($_GET['comment']))
                                include("comment.php");
                            else if(isset($_GET['set_com']))
                                include("set_com.php");
                            else if(isset($_GET['delete_com']))
                                include("delete_com.php");
                            else
                                echo"<h1>Welcome</h1>";
                        ?>
                    </div>
                </div>
            </main>
        </div>
        <div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--mini-fab mdl-button--primary" id="float_button" onclick="window.location.href='./home.php?add_member'"><i class="material-icons">add</i></div>
        <div class="mdl-tooltip mdl-tooltip--large mdl-tooltip--left" for="float_button">ADD MEMBER</div>
        <?php include("js.php"); ?>
    </body>

    </html>