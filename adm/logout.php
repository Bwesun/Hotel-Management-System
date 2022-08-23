<?php
session_start();

$des=session_destroy();

if($des){
	echo "Session has been Destroyed and Admin Logged Out!<br>";
}


//echo date("D, d M, Y")
?>
<script type="text/javascript">
	window.open('../login.php', '_self');
</script>