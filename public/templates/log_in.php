<?php

require_once('../../private/initialize.php');

?>
<?php
ob_start();
session_start();
?>
<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
		if(isset($_POST['__login__']))
{

	$username=mysqli_real_escape_string($db,$_POST['username']);
	$password=mysqli_real_escape_string($db,$_POST['password']);
	
	$result=mysqli_query($db,"SELECT * FROM admin WHERE Username='$username' AND Password='$password'");
	if(mysqli_num_rows($result)==1)
	{
			$_SESSION['admin']='DK';
			header('Location:admin/index.php');
	}
	else
	{
		echo "Admin does not exist";
	}
}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link type="text/css" href="../static/log_in.css" rel="stylesheet">
</head>
<body>




<script type="text/javascript">
	function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.emailAddr.value))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}
</script>



<div id="wrapper">
  <form action="log_in.php" method="post">
    <p>Login</p>
    
    <input type="email" name="username" placeholder="Username" required>
    <script type="text/javascript">
    	var a = ValidateEmail(Username);
        if(a==false)
        	alert("wrong email ")
    </script>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" value="Submit" name="__login__">
  </form>
</div>


</body>
</html>