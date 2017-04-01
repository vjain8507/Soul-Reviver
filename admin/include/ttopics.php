<div style="text-align:center;"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='./home.php?add_topic';">Add Topic</button></div><br>
<table>
    <col width="62px">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Heading</th>
            <th>Image</th>
            <th>Author</th>
            <th>Date</th>
            <th>Content</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $run_topic = mysqli_query($con,"select * from ttopic order by sno desc");
            $i=1;
            while($row_topic = mysqli_fetch_array($run_topic))
            {
                $sno = $row_topic['sno'];
                $heading = $row_topic['heading'];
                $image = $row_topic['image'];
                $author = $row_topic['author'];
                $date = $row_topic['date'];
                $content = $row_topic['content'];
                echo "<tr><td>".$i++."</td><td>$heading</td><td><img src='../../image/ttopics/$image' height='100px' width='100px'></td><td>$author</td><td>$date</td><td>$content</td><td><a href='./home.php?edit_topic&ev=$sno'><i class='material-icons'>mode_edit</i></a></td><td><a href='./home.php?delete_topic&de=$sno'><i class='material-icons'>delete_forever</i></a></td></tr>";
            }
        ?>
    </tbody>
</table>