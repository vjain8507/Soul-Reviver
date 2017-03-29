<style>
 .coment-form h4 { padding: 0px; margin: 0px; } .response h4 { padding: 0px; margin: 0px; } .coment-data { width: 100%; } .coment-data td { padding: 10px; } .coment-data input[type="text"] { width: 100%; border: 1px solid #000000; padding: 5px; } .coment-data input[type="email"] { width: 100%; border: 1px solid #000000; padding: 5px; } .coment-data textarea { width: 100%; resize: none; border: 1px solid #000000; padding: 5px; } .coment-data input[type="submit"] { background-color: #0a83df; color: #FFFFFF; width: 100%; border: 1px solid #0a83df; padding: 5px;} .panel-default { border: 1px solid #000000; border-radius: 0 !important; } .panel-default>.panel-heading { color: #FFFFFF; background-color: #555555; border-color: #000000; border-radius: 0 !important; text-align: center; } .panel-default>.panel-body { color: #333; background-color: #CCCCCC; border-radius: 0 !important; }
</style>
<div class="blog">
    <div class="who">
        <h1 class="title"><span>BLOG</span></h1>
    </div>
    <div class="container">
        <?php
            include("include/connect.php");
            include("include/functions.php");
            if(isset($_GET['cat']))
            {
                $cat = $_GET['cat'];
                $results_per_page = 5;
                $sql='SELECT * FROM post';
                $result = mysqli_query($con, $sql);
                $number_of_results = mysqli_num_rows($result);
                $number_of_pages = ceil($number_of_results/$results_per_page);
                if (!isset($_GET['page']))
                    $page = 1;
                else
                    $page = $_GET['page'];
                $this_page_first_result = ($page-1)*$results_per_page;
                echo "<div class='col-md-8 blog-left'>";
                $get_posts = "select * from post where cat_id = $cat order by post_id desc LIMIT $this_page_first_result,$results_per_page";
                $run_posts = mysqli_query($con,$get_posts);
                while($row_post = mysqli_fetch_array($run_posts))
                {
                    $post_id = $row_post['post_id'];
                    $cat_name = $row_post['cat_name'];
                    $post_title = $row_post['post_title'];
                    $post_date = $row_post['post_date'];
                    $post_author = $row_post['post_author'];
                    $post_image = $row_post['post_image'];
                    $post_content = word_count($row_post['post_data'],50);
                    $get_com = "select * from com where com_post=$post_id and approve='yes' order by com_id desc";
                    $run_com = mysqli_query($con,$get_com);
                    $count_com = mysqli_num_rows($run_com);
                    echo "<div class='blog-info'><hr><h4 style='text-align:center;margin:0px;'><a href='./?blog&p=$post_id'>$post_title</a></h4><p style='text-align:center;'><b>Posted By</b> $post_author <b>On</b> $post_date <b>Comments (</b>$count_com<b>)</b><hr></p><div class='blog-info-text'><div class='blog-img' style='text-align:center;'><img src='./image/post/$post_image' style='height:200px;padding-bottom:20px;' alt='$post_image'/></a></div><p class='snglp' style='text-align:justify;'>$post_content ... <b><a href='./?blog&p=$post_id'>Read More</a></b></p></div></div>";	
                }
                if($number_of_pages<=$results_per_page){}
                else
                {
                    echo "<nav style='text-align:center;'><ul class='pagination'>";
                    if($page==1)
                    {
                        echo "<li class='disabled'><a><span>&laquo;</span></a></li><li class='disabled'><a>1</a></li>";
                        for($page=2;$page<=$number_of_pages;$page++)
                            echo "<li><a href='./?blog&cat=$cat&page=$page'>$page</a></li>";
                        echo "<li><a aria-label='Last' href='./?blog&cat=$cat&page=$number_of_pages'><span>&raquo;</span></a></li>";
                    }
                    else if($page==$number_of_pages)
                    {
                        echo "<li><a aria-label='First' href='./?blog&cat=$cat&page=1'><span>&laquo;</span></a></li>";
                        for($page=1;$page<$number_of_pages;$page++)
                            echo "<li><a href='./?blog&cat=$cat&page=$page'>$page</a></li>";
                        echo "<li class='disabled'><a>$number_of_pages</a></li><li class='disabled'><a><span>&raquo;</span></a></li>";
                    }
                    else
                    {
                        echo "<li><a aria-label='First' href='./?blog&cat=$cat&page=1'><span>&laquo;</span></a></li>";
                        for($page=1;$page<=$number_of_pages;$page++)
                            echo "<li><a href='./?blog&cat=$cat&page=$page'>$page</a></li>";
                        echo "<li><a aria-label='Last' href='./?blog&cat=$cat&page=$number_of_pages'><span>&raquo;</span></a></li>";
                    }
                    echo "</ul></nav>";
                }
                echo "</div><div class='col-md-4 single-page-right'><div class='category blog-ctgry'><h4>Categories</h4><div class='list-group'>";
                $get_cat = "select * from cat";
                $run_cat = mysqli_query($con,$get_cat);
                while($row_cat = mysqli_fetch_array($run_cat))
                {
                    $cat_id = $row_cat['cat_id'];
                    $cat_name = $row_cat['cat_name'];
                    echo "<a href='./?blog&cat=$cat_id' class='list-group-item'>$cat_name</a>";
                }
                echo "</div></div></div><div class='clearfix'></div>";
            }
            else if(isset($_GET['p']))
            {
                $post = $_GET['p'];
                $get_posts = "select * from post where post_id = $post";
                $run_posts = mysqli_query($con,$get_posts);
                while($row_post = mysqli_fetch_array($run_posts))
                {
                    $post_id = $row_post['post_id'];
                    $post_title = $row_post['post_title'];
                    $post_date = $row_post['post_date'];
                    $post_author = $row_post['post_author'];
                    $post_image = $row_post['post_image'];
                    $post_data = $row_post['post_data'];
                    $get_com = "select * from com where com_post=$post_id and approve='yes' order by com_id desc";
                    $run_com = mysqli_query($con,$get_com);
                    $count_com = mysqli_num_rows($run_com);
                    echo "<div class='col-md-8 single-page-left'><div class='single-page-info'><h1 style='margin-bottom:-50px;'>$post_title</h1><div class='comment-icons'><ul><li><span class='glyphicon glyphicon-user'></span>$post_author</li><li><span class='glyphicon glyphicon-calendar'></span>$post_date</li><li><span class='glyphicon glyphicon-send'></span>Comments ($count_com)</li></ul></div><img style='margin-top:-40px;' src='image/post/$post_image' alt='$post_image'/><p style='margin-top:20px;text-align:justify;'>$post_data</p></div><div class='coment-form'><hr><h4>Leave Your Comment</h4><hr></div><form action='./?blog&p=$post' method='post' enctype='multipart/form-data'><table class='coment-data'><tr><td>Name</td><td><input type='text' name='name' required></td></tr><tr><td>Email</td><td><input type='email' name='email' required></td></tr><tr><td>Your Comment</td><td><textarea rows='5' name='comment' required></textarea></td></tr><tr><td colspan='2'><input type='submit' name='submit' value='Submit'></td></tr></table></form><div class='response'><hr><h4>Comments</h4><hr>";
                    $get_com = "select * from com where com_post=$post and approve='yes' order by com_id desc";
                    $run_com = mysqli_query($con,$get_com);
                    while($row_com = mysqli_fetch_array($run_com))
                    {
                        $com_msg = $row_com['com_msg'];
                        $com_name = $row_com['com_name'];
                        $com_date = $row_com['com_date'];
                        echo "<div class='panel panel-default'><div class='panel-heading'>$com_name Commented On $com_date</div><div class='panel-body'>$com_msg</div></div>";
                    }
                    echo "</div></div>";
                }
                echo "<div class='col-md-4 single-page-right'><div class='category blog-ctgry'><h4>Categories</h4><div class='list-group'>";
                $get_cat = "select * from cat";
                $run_cat = mysqli_query($con,$get_cat);
                while($row_cat = mysqli_fetch_array($run_cat))
                {
                    $cat_id = $row_cat['cat_id'];
                    $cat_name = $row_cat['cat_name'];
                    echo "<a href='./?blog&cat=$cat_id' class='list-group-item'>$cat_name</a>";
                }
                echo "</div></div></div><div class='clearfix'></div>";
                if(isset($_POST['submit']))
                {
                    $post = $_GET['p'];
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $comment=$_POST['comment'];
                    date_default_timezone_set('Asia/Kolkata');
                    $date=(string)date('F d, Y \@ h:i:s A');
                    if($name=='' OR $email=='' OR $comment=='')
                    {
                        echo "<script>alert('Please Fill All The Fields!!!')</script>";
                        exit();
                    }
                    else
                    {
                        $insert_com = "insert into com (com_post,com_msg,com_name,com_email,com_date,approve) values ('$post','$comment','$name','$email','$date','no')";
                        mysqli_query($con,$insert_com);
                        echo "<script>alert('Comment Will Be Added After Review.')</script>";
                        echo "<script>window.open('./?blog&p=$post','_self')</script>";
                    }
                }
            }
            else
            {
                $results_per_page = 5;
                $sql='SELECT * FROM post';
                $result = mysqli_query($con, $sql);
                $number_of_results = mysqli_num_rows($result);
                $number_of_pages = ceil($number_of_results/$results_per_page);
                if (!isset($_GET['page']))
                    $page = 1;
                else
                    $page = $_GET['page'];
                $this_page_first_result = ($page-1)*$results_per_page;
                echo "<div class='col-md-8 blog-left'>";
                $get_posts = "select * from post order by post_id desc LIMIT $this_page_first_result,$results_per_page";
                $run_posts = mysqli_query($con,$get_posts);
                while($row_post = mysqli_fetch_array($run_posts))
                {
                    $post_id = $row_post['post_id'];
                    $cat_name = $row_post['cat_name'];
                    $post_title = $row_post['post_title'];
                    $post_date = $row_post['post_date'];
                    $post_author = $row_post['post_author'];
                    $post_image = $row_post['post_image'];
                    $post_content = word_count($row_post['post_data'],50);
                    $get_com = "select * from com where com_post=$post_id and approve='yes' order by com_id desc";
                    $run_com = mysqli_query($con,$get_com);
                    $count_com = mysqli_num_rows($run_com);
                    echo "<div class='blog-info'><hr><h4 style='text-align:center;margin:0px;'><a href='./?blog&p=$post_id'>$post_title</a></h4><p style='text-align:center;'><b>Posted By</b> $post_author <b>On</b> $post_date <b>Comments (</b>$count_com<b>)</b><hr></p><div class='blog-info-text'><div class='blog-img' style='text-align:center;'><img src='./image/post/$post_image' style='height:200px;padding-bottom:20px;' alt='$post_image'/></a></div><p class='snglp' style='text-align:justify;'>$post_content ... <b><a href='./?blog&p=$post_id'>Read More</a></b></p></div></div>";
                }
                if($number_of_pages<=$results_per_page){}
                else
                {
                    echo "<nav style='text-align:center;'><ul class='pagination'>";
                    if($page==1)
                    {
                        echo "<li class='disabled'><a><span>&laquo;</span></a></li><li class='disabled'><a>1</a></li>";
                        for($page=2;$page<=$number_of_pages;$page++)
                            echo "<li><a href='./?blog&page=$page'>$page</a></li>";
                        echo "<li><a aria-label='Last' href='./?blog&page=$number_of_pages'><span>&raquo;</span></a></li>";
                    }
                    else if($page==$number_of_pages)
                    {
                        echo "<li><a aria-label='First' href='./?blog&page=1'><span>&laquo;</span></a></li>";
                        for($page=1;$page<$number_of_pages;$page++)
                            echo "<li><a href='./?blog&page=$page'>$page</a></li>";
                        echo "<li class='disabled'><a>$number_of_pages</a></li><li class='disabled'><a><span>&raquo;</span></a></li>";
                    }
                    else
                    {
                        echo "<li><a aria-label='First' href='./?blog&page=1'><span>&laquo;</span></a></li>";
                        for($page=1;$page<=$number_of_pages;$page++)
                            echo "<li><a href='./?blog&page=$page'>$page</a></li>";
                        echo "<li><a aria-label='Last' href='./?blog&page=$number_of_pages'><span>&raquo;</span></a></li>";
                    }
                    echo "</ul></nav>";
                }
                echo "</div><div class='col-md-4 single-page-right'><div class='category blog-ctgry'><h4>Categories</h4><div class='list-group'>";
                $get_cat = "select * from cat";
                $run_cat = mysqli_query($con,$get_cat);
                while($row_cat = mysqli_fetch_array($run_cat))
                {
                    $cat_id = $row_cat['cat_id'];
                    $cat_name = $row_cat['cat_name'];
                    echo "<a href='./?blog&cat=$cat_id' class='list-group-item'>$cat_name</a>";
                }
                echo "</div></div></div><div class='clearfix'></div>";
            }
        ?>
    </div>
</div>
