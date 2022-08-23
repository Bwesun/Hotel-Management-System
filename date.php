<?php
/*
$startdate = date(m);
$enddate = strtotime("1 day",$startdate);

while ($startdate < $enddate) {
  echo date("M d", $startdate),"<br>";
  $startdate = strtotime("+1 day", $startdate);
}

*/
if(isset($_POST['subsub'])){

$date1=$_POST['date1'];
$date2=$_POST['date2'];

    echo "Date1: ".$date1."<br>";
    echo "Date2: ".$date2."<br>";

$date11='19-07-28 09:17:42 - 20 seconds';

$date21=date("y-m-d h:i:s");
// Declare and define two dates 

$date1 = strtotime($date1);  

$date2 = strtotime($date2);  

  
// Formulate the Difference between two dates 

$diff = abs($date2 - $date1);  

echo "Date11: ".$date1."<br>";
echo "<br>";
echo "Date2: ".$date2."<br>";
echo "Diff:  ".$diff."<br>";

if($date1>$date2){
  echo $date1." is > than ".$date2;
}else{
  echo $date2." is > than ".$date1;
}
}
?>

<form method="post">
  <input type="date" name="date1"><br>
  <input type="date" name="date2">
  <input type="submit" name="subsub" value="submit">
</form>