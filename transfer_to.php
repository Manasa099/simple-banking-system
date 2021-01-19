<?php
session_start();
$con=mysqli_connect('localhost','root','','banking_system');
$name1=$_SESSION['name'];
$q="select name from users where not name='$name1'";
$result=mysqli_query($con,$q);
?>


<html>
<head>
   <title>Transfer</title>
   <link rel="stylesheet" href="button.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		  padding: 5px 5px;
		  text-decoration: none;
		  text-transform:uppercase;
		}
		body{
			background-color: rgb(47,137,158);
			background-image:url("images/11.jpg");
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
		.form{
			text-align:center;
			
		}
		.button{
			text-align:center;
		}
		button{
			border-radius:10px;
			background-color:brown;
		}
		button:hover{
			background-color:#26abff;
		}
		table{
			background-color:transparent;
			padding:50px;
			border:2px ridge black;
		}
		.btn {
			background-color:pink;
			border: none;
			color: white;
			padding: 12px 16px;
			font-size: 23px;
			cursor: pointer;
		}

		.btn:hover {
			background-color:dogerblue;
		}
		.label{
			color:white;
		}
	</style>
</head>
<body>
	<ul class="nav-ul">
	<a href="index.php">
		<li class="nav-li"><button class="btn"><i class="fa fa-home"></i></button></li>
	</a>
	</ul>
	<center>
		<div class="view">
			<br><br><h2 style=" font-size:45px;color:#e0115f;text-shadow: 2px 2px black;">Transfer Amount</h2>
			<form action="checkcredit.php" method="post" >
				<div class="border">
				<table>
					<tr>
						<td style="font-size:12pt;color:#010114;">
							<label class="label" for="sender" align="left">Receiver Name:</label>
							&nbsp; <select name="receiver" style="font-size: 12pt; height: 28px; width:290px;">
           <?php while($row = $result->fetch_assoc()) { ?>
			<option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
			<?php } ?>
			</td>
		</tr><br>
		<tr>
			<td>
			<br><label class="label" for="transfer">Amount:</label> 
			 &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<input type="number" name="transfer" style="font-size: 12pt; height: 28px; width:290px;" required></td>
		</tr>
       <tr>
			<td>
				<div class="button">
				<br> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<button type="submit" class="c" onMouseOver="this.style.color='brown'"onMouseOut="this.style.color='black'" value="Credit" style="color:black;font-size:18px;height:40px; width:100px;">Transfer</button>
				</div>
		   </td>
        </tr>
       </table>
	   </div>
      </form>
    </div><br>
	<form action="user.php" method="post">
			<div class="buttons">
				<button class="glow-on-hover" type="submit" name="name" value="<?php echo $name1 ?>">BACK</button>
			</div>
	</form>
</center>
</body>
</html>