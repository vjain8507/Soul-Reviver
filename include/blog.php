<div class="blog">
    <div class="who"><h1 class="title"><span>BLOG</span></h1></div>
    <div class="container">
        <?php
            include("include/connect.php");
            include("include/functions.php");
            if(isset($_GET['cat']))
            {
                $cat = $_GET['cat'];
                $page3=0;
                $page4=0;
                if(isset($_GET['cpage']))
                {
                    $page4 = $_GET['cpage'];
                    if($page4!="1")
                        $page3=($page4*5)-5;
                }
                $select3 = "select * from post where cat_id = $cat order by post_id desc";
                $query3 = mysqli_query($con,$select3);
                $cou1 = mysqli_num_rows($query3);
                $a2 = $cou1/5;
                $a2 = ceil($a2);
                echo "<div class='col-md-8 blog-left'><nav style='text-align:center;'><ul class='pagination'>";
                $ppage = $page4-1;
                $npage = $page4+1;
                if($page4==0 OR $page4==1)
                    echo "<li class='disabled'><a><span>&laquo;</span></a></li><li class='disabled'><a>1</a></li>";
                else
                    echo "<li><a href='./?blog&cat=$cat&cpage=$ppage' aria-label='Previous'><span>&laquo;</span></a></li><li><a href='./?blog&cat=$cat&cpage=1'>1</a></li>";
                for($b1=2;$b1<=$a2;$b1++)
                {
                    if($page4==$b1)
                        echo "<li class='disabled'><a>$b1</a></li>";
                    else
                        echo "<li><a href='./?blog&cat=$cat&cpage=$b1'>$b1</a></li>";
                }
                if($page4==$a2)
                    echo "<li class='disabled'><a aria-label='Next'><span>&raquo;</span></a></li>";
                else if($page4==0)
                    echo "<li><a href='./?blog&cat=$cat&cpage=2' aria-label='Next'><span>&raquo;</span></a></li>";
                else
                    echo "<li><a href='./?blog&cat=$cat&cpage=$npage' aria-label='Next'><span>&raquo;</span></a></li>";
                echo "</ul></nav>";
                $get_posts = "select * from post where cat_id = $cat order by post_id desc limit $page3,5";
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
                    echo "<div class='blog-info'><h4 style='text-align:center;margin:0px;'><a href='./?blog&p=$post_id'>$post_title</a></h4><p style='text-align:center;'><b>Posted By</b> $post_author <b>On</b> $post_date <a href='#'>Comments (0)</a></p><div class='blog-info-text'><div class='blog-img' style='text-align:center;'><img src='./image/post_image/$post_image' style='height:200px;padding-bottom:20px;' alt='$post_image'/></a></div><p class='snglp' style='text-align:justify;'>$post_content</p><a href='./?blog&p=$post_id' class='btn btn-primary'>Read More</a></div></div>";	
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
                    echo "<div class='col-md-8 single-page-left'><div class='single-page-info'><h1 style='margin-bottom:-50px;'>$post_title</h1><div class='comment-icons'><ul><li><span class='glyphicon glyphicon-user'></span>$post_author</li><li><span class='glyphicon glyphicon-calendar'></span>$post_date</li><li><span class='glyphicon glyphicon-send'></span>Comment</li></ul></div><img style='margin-top:-40px;' src='image/post_image/$post_image' alt='$post_image'/><p style='margin-top:20px;text-align:justify;'>$post_data</p></div><div class='coment-form'><h4>Leave Your Comment</h4><form><input type='text' placeholder='Name' required><input type='email' placeholder='Email' required><textarea style='resize:none;' placeholder='Comment' required></textarea><input type='submit' value='Submit'></form></div>
                    <div class='response'>
                    <h4>Comments</h4>
                    </div></div>";
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
            }
            else
            {
                $page1=0;
                $page=0;
                if(isset($_GET['page']))
                {
                    $page = $_GET['page'];
                    if($page!="1")
                        $page1=($page*5)-5;
                }
                $select2 = "select * from post order by post_id desc";
                $query2 = mysqli_query($con,$select2);
                $cou = mysqli_num_rows($query2);
                $a = $cou/5;
                $a = ceil($a);
                echo "<div class='col-md-8 blog-left'><nav style='text-align:center;'><ul class='pagination'>";
                $ppage = $page-1;
                $npage = $page+1;
                if($page==0 OR $page==1)
                    echo "<li class='disabled'><a><span>&laquo;</span></a></li><li class='disabled'><a>1</a></li>";
                else
                    echo "<li><a href='./?blog&page=$ppage' aria-label='Previous'><span>&laquo;</span></a></li><li><a href='./?blog&page=1'>1</a></li>";
                for($b=2;$b<=$a;$b++)
                {
                    if($page==$b)
                        echo "<li class='disabled'><a>$b</a></li>";
                    else
                        echo "<li><a href='./?blog&page=$b'>$b</a></li>";
                }
                if($page==$a)
                    echo "<li class='disabled'><a aria-label='Next'><span>&raquo;</span></a></li>";
                else if($page==0)
                    echo "<li><a href='./?blog&page=2' aria-label='Next'><span>&raquo;</span></a></li>";
                else
                    echo "<li><a href='./?blog&page=$npage' aria-label='Next'><span>&raquo;</span></a></li>";
                echo "</ul></nav>";
                $get_posts = "select * from post order by post_id desc limit $page1,5";
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
                    echo "<div class='blog-info'><h4 style='text-align:center;margin:0px;'><a href='./?blog&p=$post_id'>$post_title</a></h4><p style='text-align:center;'><b>Posted By</b> $post_author <b>On</b> $post_date <a href='#'>Comments (0)</a></p><div class='blog-info-text'><div class='blog-img' style='text-align:center;'><img src='./image/post_image/$post_image' style='height:200px;padding-bottom:20px;' alt='$post_image'/></a></div><p class='snglp' style='text-align:justify;'>$post_content</p><a href='./?blog&p=$post_id' class='btn btn-primary'>Read More</a></div></div>";
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