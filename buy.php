<html>
<?php
	session_start();
	include('dbcon.php');

	if (isset($_SESSION['loggedin'])) {
		#echo $_SESSION['username'];
	}
	else {
		$item =$_POST['itemname'];
		$_SESSION['itemname'] = $_POST['itemname'];
		$_SESSION['price'] = $_POST['price'];
		header('location: reg1.php?item='.$item);
	}

	$query = "insert into orders values ('" . $_SESSION['username'] ."'," ."'". $_POST['itemname']. "'," . $_POST['price']. "," . $_POST['quantity'] . ");" ;
	$conn->query($query);	
?>
<head>
	<title>Thanks For buying</title>
	<link rel="stylesheet" type="text/css" href="MyStyle2.css">
	<style type="text/css">
		body{
			background-image: url("../img/home22.jpg");
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: 100% 100%;
		}
	</style>

	<script type="text/javascript">
		function submitForm(e) {
			document.getElementById('item').value=e;
			document.getElementById('soupform').submit();
		}
		function login() {
			location.href='login2.php';
		}
		function logout() {
			location.href = 'logout.php';
		}

		function check_empty() {
			if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
				alert("Fill All Fields !");
			}
			else {
				document.getElementById('form').submit();
				alert("Form Submitted Successfully...");
			}
		}
		function div_show() {
			document.getElementById('abc').style.display = "block";
		}
		function div_hide() {
			document.getElementById('abc').style.display = "none";
		}
	</script>
</head>
<body>

	<div id="abc">
		<div id="popupContact">
			<form action="#" id="form" method="post" name="form">
				<img id="close" src="../img/cross.jpg" height="20" width="20" onclick ="div_hide()">
				<h2>Contact Us</h2>
				<hr>
				<input style="border:1px solid #ccc;font-family:raleway;" id="name" name="name" placeholder="Name" type="text">
				<input id="email" name="email" placeholder="Email" type="text">
				<textarea id="msg" name="message" placeholder="Message"></textarea>
				<a href="javascript:%20check_empty()" id="submit">Send</a>
			</form>
		</div>
	</div>
			<form id="soupform" action="items.php" method="POST">
					<input id='item' type="hidden" name="type" value="Soups">
			</form>
	<nav class="menu-bar">
				<li class="navbar-content">
					<div class="dropdown">
					  <button class="dropbtn">Eat & Drink</button>
						  <div class="dropdown-content">
							<a href="javascript:{}" onclick="submitForm('Soups');"> Soups </a>
						  	<a href="javascript:{}" onclick="submitForm('Beverages');">Beverages</a>
						    <a href="javascript:{}" onclick="submitForm('Desserts');">
						  	Desserts & Milkshakes</a>
						</div>
					</div>
				</li>
				<li class="navbar-content">
					<div class="dropdown">
					  <button class="dropbtn">Meals</button>
						  <div class="dropdown-content">
						  <a href="javascript:{}" onclick="submitForm('Breakfast');">Breakfast</a>
						  <a href="javascript:{}" onclick="submitForm('Meals');">Meals & Biryanis</a>
						</div>
					</div>
				</li>
				<li class="navbar-content">
					<div class="dropdown">
					  <button class="dropbtn">INDIAN FOOD</button>
						  <div class="dropdown-content">
						  <a href="javascript:{}" onclick="submitForm('Tamilnadu');">Tamilnadu</a>
						  <a href="javascript:{}" onclick="submitForm('Punjab');"> Punjab</a>
						  <a href="javascript:{}" onclick="submitForm('Bengal');">Bengali</a>
						  <a href="javascript:{}" onclick="submitForm('Karnataka');">Karnataka</a>
						</div>
					</div>
				</li>
				<li class="navbar-content">
					<div class="dropdown">
					  <button class="dropbtn">FOREIGN FOOD</button>
						  <div class="dropdown-content">
						  <a href="javascript:{}" onclick="submitForm('French');">French</a>
						  <a href="javascript:{}" onclick="submitForm('Chinese');">Chinese</a>
						</div>
					</div>
				</li>

				<li class="navbar-content">
					  <button onclick="div_show()" class="dropbtn">FEEDBACK US </button>
				</li>
				<li class="navbar-content">
					<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){ ?>
						<button id='logout' name="logout" onclick="logout()" class="dropbtn">Logout</button>
					<?php } else { ?>
							<button id='login' name="login" onclick="login()" class="dropbtn">Login</button>
					<?php } ?>
				</li>

			</nav>
	<div>
		
	<div class="navbar">
			<H1><MARQUEE class="marquee" SCROLLAMOUNT=20> Your Order, is on the way </MARQUEE></H1>
	</div> 
		<h2> Checkout out our restaurant ..</h2>
		<div class="item-div">
			<div class="left">
				<img src="../img/BlueMoonRest.jpg" width="90%" height="100%">
			</div>
			<div style="width: 10%;"> </div>

			<div class="right">
				<div >
					<p class="About"> Our restaurant located at beautiful and alluring location with landscapes around. We offer a variety of delicious foods of different kinds and specials. We even offer chinese and french food items and world's best food and customer service.
					</p>
				</div>
			</div> 
		</div>
	</div>
</body>
</html>