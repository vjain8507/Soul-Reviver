<?php include("connect.php"); ?>
<div style="text-align:center;">
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?city';">City</button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?position';">Position</button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?add_therapist';">Add Therapist</button>
</div><br>
<table>
    <col width="62px">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>City</th>
            <th>Position</th>
            <th>Name</th>
            <th>Image</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Experience</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $get_therapist = "select * from therapist order by id desc";
            $run_therapist = mysqli_query($con,$get_therapist);
            $i=1;
            while($row_therapist = mysqli_fetch_array($run_therapist))
            {
                $id = $row_therapist['id'];
                $city_id = $row_therapist['city_id'];
                $city_name = $row_therapist['city_name'];
                $position_id = $row_therapist['position_id'];
                $position_name = $row_therapist['position_name'];
                $name = $row_therapist['name'];
                $image = $row_therapist['image'];
                $email = $row_therapist['email'];
                $mobile = $row_therapist['mobile'];
                $experience = $row_therapist['experience'];
                echo "<tr><td>".$i++."</td><td>$city_name</td><td>$position_name</td><td>$name</td><td><img src='../../image/therapist/$image' height='100px' width='100px'></td><td>$email</td><td>$mobile</td><td>$experience</td><td><a href='./home.php?edit_therapist&ev=$id'><i class='material-icons'>mode_edit</i></a></td><td><a href='./home.php?delete_therapist&de=$id'><i class='material-icons'>delete_forever</i></a></td></tr>";
            }
        ?>
    </tbody>
</table>
