<?php include("connect.php"); ?>
<div style="text-align:center;"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?add_image';">Add Image</button></div><br>
<table>
    <col width="62px">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Image</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $get_posts = "select * from gallery order by sno desc";
            $run_posts = mysqli_query($con,$get_posts);
            $i=1;
            while($row_post = mysqli_fetch_array($run_posts))
            {
                $img_id = $row_post['sno'];
                $img_name = $row_post['imgname'];
                echo "<tr>
                <td>".$i++."</td>
                <td><img src='../../image/gallery/$img_name' width='200px'></td>
                <td><a href='./home.php?delete_image&de=$img_id'><i class='material-icons'>delete_forever</i></a></td>
                </tr>";
            }
        ?>
    </tbody>
</table>
