<?php include("connect.php"); ?>
<div style="text-align:center;"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?add_city';">Add City</button></div><br>
<table>
    <col width="62px">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>City</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $get_city = "select * from city order by city_id desc";
            $run_city = mysqli_query($con,$get_city);
            $i=1;
            while($row_city = mysqli_fetch_array($run_city))
            {
                $city_id = $row_city['city_id'];
                $city_name = $row_city['city_name'];
                echo "<tr><td>".$i++."</td><td>$city_name</td><td><a href='./home.php?edit_city&ev=$city_id'><i class='material-icons'>mode_edit</i></a></td><td><a href='./home.php?delete_city&de=$city_id'><i class='material-icons'>delete_forever</i></a></td></tr>";
            }
        ?>
    </tbody>
</table>
