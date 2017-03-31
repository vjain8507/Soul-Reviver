<?php include("connect.php"); ?>
<div style="text-align:center;">
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?section';">Section</button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?add_team';">Add Team Member</button>
</div><br>
<table>
    <col width="62px">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Section</th>
            <th>Post</th>
            <th>Name</th>
            <th>Image</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $get_team = "select * from team order by id desc";
            $run_team = mysqli_query($con,$get_team);
            $i=1;
            while($row_team = mysqli_fetch_array($run_team))
            {
                $id = $row_team['id'];
                $section_id = $row_team['section_id'];
                $section_name = $row_team['section_name'];
                $post = $row_team['post'];
                $name = $row_team['name'];
                $image = $row_team['image'];
                $email = $row_team['email'];
                $mobile = $row_team['mobile'];
                echo "<tr><td>".$i++."</td><td>$section_name</td><td>$post</td><td>$name</td><td><img src='../../image/team/$image' height='100px' width='100px'></td><td>$email</td><td>$mobile</td><td><a href='./home.php?edit_team&ev=$id'><i class='material-icons'>mode_edit</i></a></td><td><a href='./home.php?delete_team&de=$id'><i class='material-icons'>delete_forever</i></a></td></tr>";
            }
        ?>
    </tbody>
</table>
