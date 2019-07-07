<html>

<?php
	include('dbcon.php');
	$query = "";

	if(isset($_POST['type'])) {
		$query = "select * from fooditems where type='". $_POST['type']. "';";
	}

	$result = $conn->query($query);
?>

<link rel="stylesheet" type="text/css" href="MyStyle.css">
	<head>
		<title><?php echo $_POST['type'] . ' Items' ?></title>
		<style type="text/css">
			body{
				scroll-behavior: auto;
				background-size: 100% 100%;
				background-attachment: fixed;
				background-repeat: no-repeat;
				background-color: #66CC66;
			}
		</style>
	</head>
	<body>
		<div> 
			<center><h2 class="heading">Choose from the variety of items </h2></center>
		</div>

		<table class="table-body">
			<tbody>
				<tr>
				<?php 
					$n=1;
					while ($row = $result->fetch_assoc()) {
						echo "<td>";
						/*echo "<img class='itemname2' src='../img/" . $row['type'] ."/". $row['itemname'].".jpg' width='250px' height='200px'>";*/
						
						echo "<img class='itemname2' src='" . $row['img'] ."' width='250px' height='200px'>";
						
						echo "<h4 class='itemname3'>". $row['itemname'] . "&nbsp&nbsp&nbsp". (int)$row['price']. ". Rs</h4>";
						echo "	<form action='checkout.php' method='POST'>
								<input type='hidden' name='item'  value='" .$row['itemname']."'>
								<input class='order-now' style='margin-left:180px;' type='submit' name='submit' value='Order Now'>
							</form>
						</td>";
						if($n%4==0) {
							echo "</tr>";
							echo "<tr>";
						}
						$n++;
					}
				?>
			</tbody>
		</table>

	</body>
</html>