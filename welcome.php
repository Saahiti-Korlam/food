<html>
<?php
	session_start();
?>
<head>
	<title>Welcome </title>
		<link rel="stylesheet" type="text/css" href="MyStyle2.css">
		<script type="text/javascript">
		
			var image1 = new Image()
			image1.src= "../img/blue.jpg"
			var image2 = new Image()
			image2.src= "../img/blue3.jpg"
			var image3 = new Image()
			image3.src= "../img/blue4.jpg"
			var image4 = new Image()
			image4.src= "../img/blue.jpg"
			var image5 = new Image()
			image5.src= "../img/blue5.gif"

		function submitForm(e) {
			document.getElementById('item').value=e;
			document.getElementById('soupform').submit();
		}
		function login() {
			location.href='login.php';
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
	<style type="text/css">
		h1 {
			color: white;
			text-align: center;
			font-family: Showcard Gothic;
			text-shadow : 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
		}
	</style>
</head>

<body >
	<div id="abc">
		<div id="popupContact">
			<form action="#" id="form" method="post" name="form">
			<img id="close" src="../img/cross.jpg" height="20" width="20" onclick ="div_hide()">
			<h2>Contact Us</h2>
			<hr>
			<input id="name" name="name" placeholder="Name" type="text">
			<input id="email" name="email" placeholder="Email" type="text">
			<textarea id="msg" name="message" placeholder="Message"></textarea>
			<a href="javascript:%20check_empty()" id="submit">Send</a>
			</form>
		</div>
	</div>
		<div> 
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
					  <button onclick="div_show()" class="dropbtn">CONTACT US</button>
				</li>
				<li class="navbar-content">
					<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){ ?>
						<button id='logout' name="logout" onclick="logout()" class="dropbtn">Logout</button>
					<?php } else { ?>
							<button id='login' name="login" onclick="login()" class="dropbtn">Login</button>
					<?php } ?>
				</li>
				<!--
				<li class="navbar-content">
				<button id='log' name="logout" onclick="logout()" class="dropbtn" style="display: none;">Logout</button>
				</li>

				<li class="navbar-content">
					<button id='reg' onclick="login()" class="dropbtn">Login</button>
				</li> -->
			</nav>
		</div>
		
	<div class="left-div"> 
		<center>
		<img id="img" src = "../img/blue.jpg" name="slide" width="100%" height="700px">
		
		<script type="">
			var step=1
			function slideit(){
				document.images.slide.src=eval("image"+step+".src")
			if(step<5)
				step++
			else
				step=1
			setTimeout("slideit()",3000)	
			}
			slideit()
		</script>
		</center>
	</div>
	<div class="right-div">
		<iframe name="right" class="ifmr" src="homeside.html">
		</iframe>
	</div>
</body>
</html>