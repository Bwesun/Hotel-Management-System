<div class="col-md-3">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<h1><span class="fas fa-cogs"></span></h1>
								<div class="mt-3">
									<h3><?php echo $rows['name'];  ?></h3>
								</div>
							</div>
							<ul class="list-group list-group-flush">
<?php
$sql6="SELECT * FROM reservations ";
$result6=mysql_query($sql6);
$count6=mysql_num_rows($result6);
?>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<a href="index.php"><h4 class="mb-0">Total Records <span class="badge"><?php echo $count6; ?></span></h4></a>
								</li>
<?php
$sql3="SELECT * FROM reservations WHERE status='Pending' ";
$result3=mysql_query($sql3);
$count3=mysql_num_rows($result3);
?>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<a href="pending.php"><h4 class="mb-0">Pending <span class="badge"><?php echo $count3; ?></span></h4></a>
								</li>
<?php
$sql4="SELECT * FROM reservations WHERE status='Approved' ";
$result4=mysql_query($sql4);
$count4=mysql_num_rows($result4);
?>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<a href="approved.php"><h4 class="mb-0">Approved <span class="badge"><?php echo $count4; ?></span></h4></a>
								</li>
<?php
$sql5="SELECT * FROM reservations WHERE status='Cancelled' ";
$result5=mysql_query($sql5);
$count5=mysql_num_rows($result5);
?>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<a href="cancelled.php"><h4 class="mb-0">Canceled <span class="badge"><?php echo $count5; ?></span></h4></a>
								</li>

<?php
$sql7="SELECT * FROM reservations WHERE status='Ended' ";
$result7=mysql_query($sql7);
$count7=mysql_num_rows($result7);
?>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<a href="end.php"><h4 class="mb-0">Ended <span class="badge"><?php echo $count7; ?></span></h4></a>
								</li>
<?php 
$end_date=date("Y-m-d");
$sql8="SELECT * FROM reservations WHERE end_date<='$end_date' AND status!='Ended' AND status!='Cancelled' ";
$result8=mysql_query($sql8);

$count8=mysql_num_rows($result8);
?>
								
							</ul>
						</div>
					</div>
				</div>