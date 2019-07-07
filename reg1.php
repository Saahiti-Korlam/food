<html>
<?php
	include 'dbcon.php';

	if(isset($_POST['submit'])) {
		$firstname =  $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password =$_POST['password'];
		$hash = password_hash($password, PASSWORD_BCRYPT);
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$item = $_POST['item'];
		$location = $_POST['location'];

		$query = "select username from userinfo where username='$username'";
		$res = $conn->query($query);

		if($res->num_rows>0) {
			while($row = $res->fetch_assoc()){
					echo "username already taken";
			}
		}
		else {
			$query = "insert into userinfo values('$firstname','$lastname','$username','$hash','$email','$phone','$location');";
			$res = $conn->query($query);
			ini_set('session.gc_maxlifetime', 3600);
			session_set_cookie_params(3600);
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['loggedin'] = true;
			header('location: checkout.php?item=$item&submitt=true');
		}
	}
	#$item2 = $_GET['item'];
	if(isset( $_POST['login-submit'])) {
		#echo "enter";
			$userid = $_POST['username'];
			$pass = $_POST['password'];
			$item = $_POST['item'];
			$query = "SELECT * FROM userinfo where username='$userid';";
			$result = $conn->query($query);

			if ($result->num_rows > 0) {

				 $user = $result->fetch_assoc();

				 $username = $user['username'];
				 $pas = $user['password'];

				 if($userid == $username  && password_verify($pass, $pas)) {
					echo "successfull";
					session_start();
				 	$_SESSION['loggedin'] = true;
				 	$_SESSION['username'] = $username;
					header('location: checkout.php?item='.$item.'&submitt=true');
				 }
			}
			else 	 
				 echo "<script type='text/javascript'> alert('invalid details') </script>";
		}
?>

<head>
	<title> Login and Registration</title>
	<link rel="stylesheet" href="mysty.css">
	<style type="text/css">
		body{
			background-image: url('../img/yummy.jpg');
			background-attachment: fixed;
		}
	</style>
</head>
<body>
	<div class="login-page">
	<div class="form">
		<form class="register-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
			<input name="firstname" type="text" placeholder="first name" id="i1"/>
			<input name="lastname" type="text" placeholder="last name" id="i2"/>
			<input type="text" name="username" placeholder="username" id="i6">
			<input type="text" name="email" placeholder="email id" id="i3"/>
			<input type="password" name="password" placeholder="password" id="i4"/>
			<input type="text" name="phone" placeholder="phone number" id="i5"/>
			<input type="hidden" name="item" value="<?php echo $_GET['item']; ?>">
			<select cols="10" name="location">
				<option value="00">Location</option>
				<option value="Srikakulam">Srikakulam</option>
				<option value="Vizag">Vizag</option>
				<option value="Vizianagaram">Vizianagaram</option>
				<option value="Anakapalli">Anakapalli</option>
			</select>
			<br>
			<button name="submit">Create new</button>
			<p class="message">Already Registered? <a href="#">Login</a></p>
		</form>
		<h2>Please login to continue </h2>
		<form class="login-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
			<input type="text" name="username" placeholder="user name" required>
			<input type="password" name="password" placeholder="password" required>
			<input type="hidden" name="item" value="<?php echo $_GET['item']; ?>">
			<button name="login-submit">Login</button>
			<p class="message">Not Registered? <a href="#">Register</a></p>
		</form>
		</div>
		</div>
		<script src='https://code.jquery.com/jquery-3.2.1.min.js'>
		
		</script>
		<script>
		  $('.message a').click(function(){
		  $('form').animate({height: "toggle", opacity: "toggle"},"slow");
		  });
		</script>

</html>