<form method="post" action="./home.php?add_member">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="name" name="uname" autocomplete="off" required>
        <label class="mdl-textfield__label" for="name">Name</label>
    </div><br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="password" id="password" name="pass" autocomplete="off" required>
        <label class="mdl-textfield__label" for="password">Password</label>
    </div><br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="password" id="cpassword" name="cpass" autocomplete="off" required>
        <label class="mdl-textfield__label" for="cpassword" id="checkp">Confirm Password</label>
    </div><br>
    <div style="text-align:center;"><button name="add_member" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">ADD</button></div>
</form>
<?php
	if(isset($_POST['add_member']))
	{
		$uname=$_POST['uname'];
		$pass=$_POST['pass'];
        $cpass=$_POST['cpass'];
		if($uname=='' OR $pass=='' OR $cpass=='')
        {
            echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
        }
        else
		{
            if($pass!=$cpass)
            {
                echo "<script>alert('Member Not Added.')</script><script>window.open('./home.php','_self')</script>";
            }
            else
            {
                mysqli_query($con,"insert into admin (user,pwd) values ('$uname','$pass')");
                echo "<script>alert('Member Added.')</script><script>window.open('./home.php','_self')</script>";
            }
        }
	}
?>