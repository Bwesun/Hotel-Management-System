<?php 
session_start();
mysql_connect("localhost:3306", "censono2_hotel_user", "inno08144529253") or die('Cannot Connect to Server'.mysql_error());
mysql_select_db("censono2_hotel");

$user_id=$_SESSION['user_id'];

$get_id=$_GET['reference'];

$sql="UPDATE reservations SET status='Approved' WHERE id='$user_id' ";
$result=mysql_query($sql);

if($result){
	echo "<script type='text/javascript'>
		window.open('profile.php','_self');
	</script>";
}else{
	echo "<script type='text/javascript'>
	alert('validation Not Successful!');
	//window.open('reserve.php','_self');
	</script>";
	echo mysql_error();
}
mysql_close();
?>