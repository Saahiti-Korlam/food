<html>
<?php
	include('dbcon.php');
	if(isset($_GET['action'])) {
		if($_GET['action'] == 'success') {
			echo "<h1>successfully registered please login</h1>";
			#echo "<script>document.getElementById('display').innerHTML='Successfully registered';
			#	</script>";
		}
	}

	if(isset( $_POST['submit'])) {
			$userid = $_POST['username'];
			$pass = $_POST['password'];

			$query = "SELECT * FROM userinfo where username='$userid';";
			$result = $conn->query($query);

			if ($result->num_rows > 0) {
				 $user = $result->fetch_assoc();
				 	$username = $user['username'];
				 	$pas = $user['password'];
				 	if(password_verify($pass, $user['password']))
				 		echo "valid password";
				 	else
				 		echo "invalid pas";
				 	if($userid == $username  && password_verify($pass, $pas)) {
				 		session_start();
				 		$_SESSION['loggedin'] = true;
				 		$_SESSION['username'] = $username;
				 		header('location: welcome.php?login=true');
				 }
			}
			else 	 
				 echo "<script type='text/javascript'> alert('invalid details') </script>";
		}

?>

<head>
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="MyStyle.css">
	<script type="text/javascript">
	function check(myform)
	{
		if (myform.first.value == "" || myform.first.value == null  || myform.last.value == "" || myform.last.value == null )
		{
			alert("Fields are mandatory");
			return false;
		}
		var regex = /^[a-zA-Z]+$/;
		if(regex.test(myform.first.value) == false ) //|| regex.test(myform.last.value) == false)
		{
			alert("Name must be in alphabets only");
			myform.first.focus(); //myname.last.focus();
			return false;
		}
		
		return true;	
	}
</script>

<style>
	div {
	padding: 15px 25px;
	font-size: 15px;
	text-align: center;
	 
	/*background-color: rgb(800, 544, 100);*/
	border: 2px solid lime;
	border-radius: 20px;
	box-shadow: 9px 9px solid black;
	margin-top: 10%;
	width: 200px;
	}
	body{
		/*
		background-image: url("http://fishermanslandingrestaurant.com/wp-content/uploads/2014/05/main_background2.png");*/
		background-image: url("http://static.facegfx.com/vector/2013/1/9/facegfx-vector-set-of-restaurant-menu-cover-background-vector-04.jpg");
		background-repeat: no-repeat;
		background-size: 100% 100%;
		background-attachment: fixed;
	}

</style>

</head>
<body>
<body>
	<br><br><FORM name="formvalidate" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" onSubmit="return check(formvalidate)">

	
	<div style="margin-top: -10px;background-image: linear-gradient(to right,blue,#CC66CC);">
		<CENTER>
		<TABLE width=100% style="text-align:center">
			<TR><TD><h1><font color="yellow">Login</h1></TD></TR>
		</TABLE>
		
	<form >	
		<font class="login"> User Id: </font>
		<input  type="text" name="username"/><br><br>
		<font class="login"> Password: </font>
		<input type="password" name="password"/><br><br>

		<input class="login-button" type="submit" name="submit" value="Login">&emsp;&emsp;&emsp;
		<input class="cancel-button" type="button" name="Reset" value="cancel"><br><br>
		<span class="new-users"> New User?click here </span> 
		<a class="register-link" href="reg.html" target="right">Register</a>
	</form>
</div>
</table>
</body>
</HTML>