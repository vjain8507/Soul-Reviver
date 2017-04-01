<div style="text-align:center;"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?add_cat';">Add Category</button></div><br>
<table>
    <col width="62px">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Category</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $run_cat = mysqli_query($con,"select * from cat order by cat_id desc");
            $i=1;
            while($row_cat = mysqli_fetch_array($run_cat))
            {
                $cat_id = $row_cat['cat_id'];
                $cat_name = $row_cat['cat_name'];
                echo "<tr><td>".$i++."</td><td>$cat_name</td><td><a href='./home.php?edit_cat&ev=$cat_id'><i class='material-icons'>mode_edit</i></a></td><td><a href='./home.php?delete_cat&de=$cat_id'><i class='material-icons'>delete_forever</i></a></td></tr>";
            }
        ?>
    </tbody>
</table>