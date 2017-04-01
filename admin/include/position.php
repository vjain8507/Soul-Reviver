<div style="text-align:center;"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?add_position';">Add Position</button></div><br>
<table>
    <col width="62px">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Position</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $run_position = mysqli_query($con,"select * from position_old order by position_id desc");
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