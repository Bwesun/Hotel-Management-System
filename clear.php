<?php
 /*
 $code=mt_rand();
  $code=substr($code, 1);
  $security_code='E'.$code.'H';

  echo $security_code;

$date=date_create("2013-03-15");

echo date_format($date, "Y-m-d");
//echo date_diff($date, "Y-m-d");
*/

  if(isset($_POST['subsub'])){
  	$date1=$_POST['date1'];
  	$date2=$_POST['date2'];


  	$result=$date2-$date1;

  	echo "Result: ".$result."<br>";
  	echo "Date1: ".$date1."<br>";
  	echo "Date2: ".$date2."<br>";
if($date1>$date2){
	  	echo "Conclusion: ".$date1."is Greater than ".$date2."<br>";
	  	echo "Subtraction: ".$result."<br>";
}else if($date1<$date2){

	  	echo "Conclusion: ".$date1." is Less than ".$date2."<br>";
	  	echo "Subtraction: ".$result."<br>";
}else{
	echo "Conclusion:They are The same! <br>";
}


  }
?>
<form method="post">
	<input type="date" name="date1"><br>
	<input type="date" name="date2">
	<input type="submit" name="subsub" value="submit">
</form>

<br>
<br>
<br>
<?php


/*
$usernum=12;
if ($usernum>10){
	trigger_error("Number cannot be larger than 10");
}
*/
	?>