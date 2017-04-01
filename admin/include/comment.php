<table>
    <col width="62px">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Post</th>
            <th>Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Approve</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(isset($_GET['p']))
            {
                $get_id = $_GET['p'];
                $get_com = "select * from com where com_post='$get_id' order by com_id desc";
            }
            else
                $get_com = "select * from com order by com_id desc";
            $run_com = mysqli_query($con,$get_com);
            $i=1;
            while($row_com = mysqli_fetch_array($run_com))
            {
                $com_id = $row_com['com_id'];
                $com_post = $row_com['com_post'];
                $com_msg = $row_com['com_msg'];
                $com_name = $row_com['com_name'];
                $com_email = $row_com['com_email'];
                $com_date = $row_com['com_date'];
                $approve = $row_com['approve'];
                $post = mysqli_fetch_array(mysqli_query($con,"select post_title from post where post_id='$com_post'"));
                $post_title = $post['post_title'];
                echo "<tr><td>".$i++."</td><td>$post_title</td><td>$com_date</td><td>$com_name</td><td>$com_email</td><td>$com_msg</td><td>";
                if(isset($_GET['p']))
                {
                    $getid = $_GET['p'];
                    if($approve=='yes')
                        echo "<a href='./home.php?set_com&p=$getid&c=$com_id'><i class='material-icons'>done</i></a>";
                    else
                        echo "<a href='./home.php?set_com&p=$getid&c=$com_id'><i class='material-icons'>close</i></a>";
                }
                else
                {
                    if($approve=='yes')
                        echo "<a href='./home.php?set_com&c=$com_id'><i class='material-icons'>done</i></a>";
                    else
                        echo "<a href='./home.php?set_com&c=$com_id'><i class='material-icons'>close</i></a>";
                }
                echo"</td><td>";
                if(isset($_GET['p']))
                {
                    $getid = $_GET['p'];
                    echo "<a href='./home.php?delete_com&p=$getid&de=$com_id'><i class='material-icons'>delete_forever</i></a>";
                }
                else
                    echo "<a href='./home.php?delete_com&de=$com_id'><i class='material-icons'>delete_forever</i></a>";
                echo "</td></tr>";
            }
        ?>
    </tbody>
</table>