<?php include("connect.php"); ?>
<div style="text-align:center;"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?add_section';">Add Section</button></div><br>
<table>
    <col width="62px">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Section</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $get_section = "select * from section";
            $run_section = mysqli_query($con,$get_section);
            $i=1;
            while($row_section = mysqli_fetch_array($run_section))
            {
                $section_id = $row_section['section_id'];
                $section_name = $row_section['section_name'];
                echo "<tr><td>".$i++."</td><td>$section_name</td><td><a href='./home.php?edit_section&ev=$section_id'><i class='material-icons'>mode_edit</i></a></td><td><a href='./home.php?delete_section&de=$section_id'><i class='material-icons'>delete_forever</i></a></td></tr>";
            }
        ?>
    </tbody>
</table>
