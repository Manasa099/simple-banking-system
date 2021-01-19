<?php
session_start();
$con=mysqli_connect('localhost','root','','banking_system');
$name1=$_POST['sender'];
$q="select amount from users where name='$name1'";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_array($result);
$var=$row['amount'];
$from=$_POST['sender'];
$to=$_POST['receiver'];
$q1="select amount from users where name='$to'";
$result1=mysqli_query($con,$q1);
$row=mysqli_fetch_array($result1);
$var1=$row['amount'];
session_destroy();
if ( $var >= $_POST["transfer"] )
{
    $sub=$var-$_POST["transfer"];
    $q="update users set amount='$sub' where name='$from' ";
    $result=mysqli_query($con,$q);
    $sum=$var1+$_POST["transfer"];
    $q="update users set amount='$sum' where name='$to' ";
    $result=mysqli_query($con,$q);
	$c=$_POST["transfer"];
	$q="insert into mini_statement(sender,receiver,amount)
		values('$from','$to',$c)";
	$result=mysqli_query($con,$q);
    
        $message="Successful transfer";
   echo"<script type='text/javascript'>alert('$message');
   </script>";
    include 'getdetail.php';
    
}
else
{
    $message="Insufficient Balance";
   echo"<script type='text/javascript'>alert('$message');
   </script>";
    
    include 'getdetail.php';

}
?>