<?php include("connect.php"); ?>
<div style="text-align:center;">
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?category';">Category</button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?comment';">Comments</button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?add_post';">Add Post</button>
</div><br>
<table>
    <col width="62px">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Date</th>
            <th>Category</th>
            <th>Title</th>
            <th>Author</th>
            <th>Image</th>
            <th>Content</th>
            <th>Comments</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $get_posts = "select * from post order by post_id desc";
            $run_posts = mysqli_query($con,$get_posts);
            $i=1;
            while($row_post = mysqli_fetch_array($run_posts))
            {
                $post_id = $row_post['post_id'];
                $cat_name = $row_post['cat_name'];
                $post_title = $row_post['post_title'];
                $post_date = $row_post['post_date'];
                $post_author = $row_post['post_author'];
                $post_image = $row_post['post_image'];
                $post_data = $row_post['post_data'];
                $get_com = "select * from com where com_post=$post_id and approve='yes' order by com_id desc";
                $run_com = mysqli_query($con,$get_com);
                $count_com = mysqli_num_rows($run_com);
                echo "<tr><td>".$i++."</td><td>$post_date</td><td>$cat_name</td><td>$post_title</td><td>$post_author</td><td><img src='../../image/post/$post_image' height='100px' width='100px'></td><td>$post_data</td><td style='text-align:center;'><a href='./home.php?comment&p=$post_id' style='text-decoration:none;font-size:20px;color:inherit;'>$count_com</a></td><td><a href='./home.php?edit_post&ev=$post_id'><i class='material-icons'>mode_edit</i></a></td><td><a href='./home.php?delete_post&de=$post_id'><i class='material-icons'>delete_forever</i></a></td></tr>";
            }
        ?>
    </tbody>
</table>
