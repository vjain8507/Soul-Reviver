<table>
    <col width="62px">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Plan</th>
            <th>Name</th>
            <th>Image</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $run_user = mysqli_query($con,"select * from login order by log_id desc");
            $i=1;
            while($row_user = mysqli_fetch_array($run_user))
            {
                $log_id = $row_user['log_id'];
                $log_image = $row_user['log_image'];
                $log_name = $row_user['log_name'];
                $log_gender = $row_user['log_gender'];
                $log_email = $row_user['log_email'];
                $log_mobile = $row_user['log_mobile'];
                $log_address = $row_user['log_address'];
                $log_city = $row_user['log_city'];
                $log_state = $row_user['log_state'];
                $log_zip = $row_user['log_zip'];
                $log_plan = $row_user['log_plan'];
                echo "<tr><td>".$i++."</td><td>$log_plan</td><td>$log_name</td><td><img src='../../image/users/$log_image' height='100px' width='100px'></td><td>$log_gender</td><td>$log_email</td><td>$log_mobile</td><td>$log_address</td><td>$log_city</td><td>$log_state</td><td>$log_zip</td></tr>";
            }
        ?>
    </tbody>
</table>