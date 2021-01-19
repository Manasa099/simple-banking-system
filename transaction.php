<?php
session_start();
$con=mysqli_connect('localhost','root','','banking_system');
$q="select *from mini_statement";
$result=mysqli_query($con,$q);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Transaction</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="button.css">
	<style>
		.nav-ul {
			list-style-type: none;
			margin: 0;
			padding: 5px;
			verflow: hidden;
			
			}

		.nav-li {
		  float:left;
		}

		.nav-li a {
			
		  display: block;
		  color:#010114;
		  text-align: center;
		  padding: 8px 10px;
		  text-decoration: none;
		  text-transform:uppercase;
		}
		body{
			background-image:url("images/11.jpg");
			
			background-repeat: no-repeat;
			background-size:cover;
		}
		table{
			text-align:center;
			margin-left: auto;
			margin-right: auto;
			border:4px solid black;
			border-collapse:collapse;
			 background: transparent;
			 
			}
		th{
			color:violet;
			font-size:26px;
			padding:16px;
		}
		
		td{
			font-size:23px;
			color: #04fbf4;
			padding: 10px 20px 10px 22px;
		}
		tr{
			transition: background 0.3s, box-shadow 0.3s;
		}
		th,td{
			border-collapse:collapse;
			border:2px groove gray;
		}
		h2,h1{
			padding:20px;
			font-size:35px;
			color:#805a46;
			text-shadow: 1px 1px black;
			text-align:center;
		}
		.btn {
			background-color:pink;
			border: none;
			color: white;
			padding: 12px 16px;
			font-size: 23px;
			cursor: pointer;
		}

		.buttons{
			
			right:42%;
			text-align:center;
		}

		.btn:hover {
			background-color:  DodgerBlue;
		}
	</style>
	</head>
	<body>
	<ul class="nav-ul">
	<a href="index.php">
		<li class="nav-li"><button class="btn"><i class="fa fa-home"></i></button></li>
	</a>
	</ul>
		
		<table class="flat-table-1">
		<h1 style="color:#1bf731;text-shadow: 2px 2px black;">Transaction Details</h1>
			<tr>
				<th>Sender</th>
				<th>receiver</th>
				<th>Amount</th>
			</tr>
			<tr>
			
			<?php while($row = $result->fetch_assoc()) { ?>
			
			<tr>
				<td><?php echo $row["sender"]; ?></td>
				<td><?php echo $row["receiver"]; ?></td>
				<td><?php echo $row["amount"]; ?></td>
			</tr>
			<?php } ?>
		</table>
		<br>
		<br>
		<form action="index.php" method="post">
			<div class="buttons">
				<button class="glow-on-hover" type="submit" name="name">BACK</button>
			</div>
		</form>
		
	</body>
</html>