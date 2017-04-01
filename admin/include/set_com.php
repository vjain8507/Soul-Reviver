<?php
    if(isset($_GET['c']))
	{
		$set_id = $_GET['c'];
        $run_com = mysqli_fetch_array(mysqli_query($con,"select approve from com where com_id='$set_id'"));
        $approve = $run_com['approve'];
        if($approve=='yes')
            $update_com = "update com set approve='no' where com_id=$set_id";
        else
            $update_com = "update com set approve='yes' where com_id=$set_id";
        mysqli_query($con,$update_com);
        if(isset($_GET['p']))
        {
            $postid = $_GET['p'];
            echo "<script>window.open('./home.php?comment&p=$postid','_self')</script>";
        }
        else
            echo "<script>window.open('./home.php?comment','_self')</script>";
    }
?>