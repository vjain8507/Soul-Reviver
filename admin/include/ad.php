<?php include("connect.php"); ?>
<div style="text-align:center;"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?add_ad';">Add Ad</button></div><br>
<table>
    <col width="62px">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Ad</th>
            <th>Set</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $get_ad = "select * from ad order by ad_id desc";
            $run_ad = mysqli_query($con,$get_ad);
            $i=1;
            while($row_ad = mysqli_fetch_array($run_ad))
            {
                $ad_id = $row_ad['ad_id'];
                $ad_image = $row_ad['ad_image'];
                $ad_status = $row_ad['ad_status'];
                echo "<tr>
                <td>".$i++."</td>
                <td><img src='../../image/ads/$ad_image' width='200px'></td>
                <td>";
                    if($ad_status=='1')
                        echo "<a href='./home.php?set_ad&id=$ad_id'><i class='material-icons'>done_all</i></a>";
                    else
                        echo "<a href='./home.php?set_ad&id=$ad_id'><i class='material-icons'>done</i></a>";
                echo "</td>
                <td><a href='./home.php?delete_ad&de=$ad_id'><i class='material-icons'>delete_forever</i></a></td>
                </tr>";
            }
        ?>
    </tbody>
</table>
