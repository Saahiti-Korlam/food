<html>
<?php
	session_start();
	include('dbcon.php');
		$item;
		if(isset( $_POST['submit'])){
			$item = $_POST['item'];
			
		}
		$price = 0;
		if(isset($_GET['submitt'])) {
			$item = $_GET['item'];
		}
			$query = "select * from fooditems where itemname ='".$item . "';";
			$result = $conn->query($query);
			if ($result->num_rows > 0) {
				 while($row = $result->fetch_assoc()) {
				 	$price = $row['price'];
				 }
			}
?>

<head>
	<title> CheckOut </title>
	<link rel="stylesheet" type="text/css" href="MyStyle.css">

	 <script>
	    function setQuantity(upordown) {
		    var quantity = document.getElementById('quantity');

		    if (quantity.value > 1) {
		        if (upordown == 'up') {
		        	++document.getElementById('quantity').value;
		        }
		        else if (upordown == 'down'){
		        	--document.getElementById('quantity').value;
		        }}
		    else if (quantity.value == 1) {
		        if (upordown == 'up'){
		        	++document.getElementById('quantity').value;
		        }}
		    else { 
		    	document.getElementById('quantity').value=1;
		    }

		    document.getElementById('quanty').value =document.getElementById('quantity').value ;

		    document.getElementById('price').innerHTML =parseFloat(parseFloat(document.getElementById('quantity').value).toFixed(2)*<?php echo $price ?>).toFixed(2);

		    document.getElementById('price2').value =parseFloat(parseFloat(document.getElementById('quantity').value).toFixed(2)*<?php echo $price ?>).toFixed(2);
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
		function submitForm(e) {
			document.getElementById('item').value=e;
			document.getElementById('soupform').submit();
		}
	</script>

	<style type="text/css">
		body{
			background-image: url("../img/checkout.jpg");
			background-size: 100% 100%;
			background-repeat: no-repeat;
			background-attachment: fixed;
		}
	</style>
	

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
					  <button onclick="div_show()" class="dropbtn">CONTACT US</button>
				</li>
				<li class="navbar-content">
					<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){ ?>
						<button id='logout' name="logout" onclick="logout()" class="dropbtn">Logout</button>
					<?php } else { ?>
							<button id='login' name="login" onclick="login()" class="dropbtn">Login</button>
					<?php } ?>
				</li>

			</nav>
	<div class="confirm-div"> 
		<div class="checkout">
				<div class="content-div">
					<?php 
						$result = $conn->query($query);
						$row = $result->fetch_assoc();
						#echo $row['img'];
						echo "<img class='order-image' src='". $row['img'] . "'' height='300px' width='100px'>"; ?>
				<div class="itemname" style="padding-top: 5%;"> 
					<h1>
						<?php echo $item ?>
					</h1>
				</div>
			</div>
			<br>
			<div>
				<font size="5">Quantity: </font>

				<span id="quantity-field" >
			        <button class="button" id="down" onclick="setQuantity('down');">-</button>
			        <input class="quantity" type="text" id="quantity" value="1">
			        <button class="button" id="up" onclick="setQuantity('up');">+</button>
			    </span>
			    <br>
			    <h2>
			    <form action="buy.php" method="POST">
			    	<input type="hidden" name="itemname" value="<?php echo $item; ?>">
				    <input type="hidden" id="price2" name="price" value="<?php echo $price; ?>">
				    <input type="hidden" name="quantity" id="quanty" value="1">

				    Price : <label id="price"> <?php echo $price; ?></label> Rs
				    </h2>
				    <svg width="12" height="12" viewBox="0 0 9 12" class="_3VH2pM" xmlns="http://www.w3.org/2000/svg"><path fill="#2874f0" class="_16TkYi" d="M4.2 5.7c-.828 0-1.5-.672-1.5-1.5 0-.398.158-.78.44-1.06.28-.282.662-.44 1.06-.44.828 0 1.5.672 1.5 1.5 0 .398-.158.78-.44 1.06-.28.282-.662.44-1.06.44zm0-5.7C1.88 0 0 1.88 0 4.2 0 7.35 4.2 12 4.2 12s4.2-4.65 4.2-7.8C8.4 1.88 6.52 0 4.2 0z" fill-rule="evenodd"></path></svg>
				    <input type="text" name="" maxlength="6" placeholder="enter delivery pincode" required>
				    <br><b>usually delivered in 3-4 hours</b>
					<center><input class="buy" type="submit" name="submit" value="Buy"></center>
				</form>
				
			</div>
		</div>
	</div>
	
</body>
</html>


