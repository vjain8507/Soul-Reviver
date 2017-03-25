<header id="headerArea">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="slider_area">           
                <ul id="demo1" class="slides">
                    <li>
                        <img src="image/slider/background.jpg" alt="background"/>
                        <div class="slide-desc">
                            <div class="slide_descleft">
                                <img src="image/others/mind-gear.png" alt="mind-gear">
                            </div>
                            <div class="slide_descright">
                                <h1>WELCOME TO SOUL REVIVER</h1>
                                <div class="header_btnarea">
                                    <?php
                                        if(isset($_SESSION['username']))
                                            echo "<a href='./?account' class='learnmore_btn'>My Account</a><a href='./?logout' class='download_btn'>Log Out</a>";
                                        else
                                            echo "<a href='./?signin' class='learnmore_btn'>Sign In</a><a href='./?signup' class='download_btn'>Sign Up</a>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <img src="image/slider/background.jpg" alt="background"/>
                        <div class="slide-desc">
                            <div class="slide_descleft">
                                <img src="image/others/mind-gear.png" alt="mind-gear">
                            </div>
                            <div class="slide_descright">
                                <h1>WELCOME TO SOUL REVIVER</h1>
                                <div class="header_btnarea">
                                    <?php
                                        if(isset($_SESSION['username']))
                                            echo "<a href='./?account' class='learnmore_btn'>My Account</a><a href='./?logout' class='download_btn'>Log Out</a>";
                                        else
                                            echo "<a href='./?signin' class='learnmore_btn'>Sign In</a><a href='./?signup' class='download_btn'>Sign Up</a>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>