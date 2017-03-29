<?php include("connect.php"); ?>
<div style="text-align:center;"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?add_position';">Add Position</button></div><br>
<table>
    <col width="62px">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Position</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $get_position = "select * from position_old order by position_id desc";
            $run_position = mysqli_query($con,$get_position);
            $i=1;
            while($row_position = mysqli_fetch_array($run_position))
            {
                $position_id = $row_position['position_id'];
                $position_name = $row_position['position_name'];
                echo "<tr><td>".$i++."</td><td>$position_name</td><td><a href='./home.php?edit_position&ev=$position_id'><i class='material-icons'>mode_edit</i></a></td><td><a href='./home.php?delete_position&de=$position_id'><i class='material-icons'>delete_forever</i></a></td></tr>";
            }
        ?>
    </tbody>
</table>
