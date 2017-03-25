<?php
    include("connect.php");
    if(isset($_GET['ev']))
    {
        $edit_id = $_GET['ev'];
        $get_post = "select * from post where post_id='$edit_id'";
        $run_post = mysqli_query($con,$get_post);
        while($row_post = mysqli_fetch_array($run_post))
        {
            $cat_name = $row_post['cat_name'];
            $post_id = $row_post['post_id'];
            $post_date = $row_post['post_date'];
            $post_author = $row_post['post_author'];
            $post_title = $row_post['post_title'];
            $post_image = $row_post['post_image'];
            $post_data = $row_post['post_data'];
        }
    }
?>
<?php include("tinymce.php"); ?>
<form action="./home.php?edit_post&ev=<?php echo $post_id; ?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <span>Category - </span>
            </td>
            <td>
                <div class="mdl-selectfield mdl-js-selectfield">
                    <select class="mdl-selectfield__select" id="category" name="category">
                        <?php
                            include("connect.php");
                            $get_cat = "select * from cat";
                            $run_cat = mysqli_query($con,$get_cat);
                            $i=1;
                            while($row_cat = mysqli_fetch_array($run_cat))
                            {
                                $cat_name = $row_cat['cat_name'];
                                echo "<option value='$cat_name'>$cat_name</option>";
                            }
                        ?>
                    </select>
                    <label class="mdl-selectfield__label" for="category"></label>
              </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Title - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="title" class="mdl-textfield__input" rows="2" type="text" id="title"><?php echo $post_title ?></textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Author - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea name="author" class="mdl-textfield__input" rows="2" type="text" id="author"><?php echo $post_author ?></textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Image - </span>
            </td>
            <td>
                <div class="mdl-textfield mdl-js-textfield">
                    <input name="image" class="mdl-textfield__input" type="file" id="image"><img src="../../image/post_image/<?php echo $post_image; ?>" width="60" height="60" />
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <span>Content - </span>
            </td>
            <td>
                <textarea name="content" rows="2" type="text" id="content"><?php echo $post_data; ?></textarea>
            </td>
        </tr>
        <tr colspan="2" style="text-align:center;">
            <td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="edit_post">Add</button></td>
        </tr>
    </table>
</form>
<?php
	if(isset($_POST['edit_post']))
	{
        $cat_name = $_POST['category'];
        $post_title = $_POST['title'];
        $post_date = (string)date('F j, Y');
        $post_author = $_POST['author'];
        $post_image = $_FILES['image']['name'];
		$post_image_tmp = $_FILES['image']['tmp_name'];
        $post_data = $_POST['content'];
		if($cat_name=='' OR $post_title=='' OR $post_author=='' OR $post_image==''OR $post_data=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
            move_uploaded_file($post_image_tmp,"../../image/post_image/$post_image");
			$insert_post = "insert into post (cat_name,post_title,post_image,post_data,post_author,post_date) values ('$cat_name','$post_title','$post_image','$post_data','$post_author','$post_date')";
			$run_post = mysqli_query($con,$insert_post);
			echo "<script>alert('Post Has Been Added Successfully')</script>";
			echo "<script>window.open('./home.php?post','_self')</script>";
		}
	}
?>