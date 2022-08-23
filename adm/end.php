<?php
session_start();
$use_id=$_SESSION['admin_id'];

if(!isset($_SESSION['admin_id'])){
	echo "<script>alert('You are not Logged in. Please Login!')</script>";
    echo "<script>window.open('../login.php', '_self')</script>";
}else if(isset($_SESSION['user_id'])){
	echo "<script>alert('You are not allowed to Access this Page!')</script>";
    echo "<script>window.open('../login.php', '_self')</script>";
}
	include('head.php');
	include('connect.php');

	$sql="SELECT * FROM users WHERE id='$use_id' ";
	$result=mysql_query($sql);

	$rows=mysql_fetch_assoc($result);
?>

<div class="container">
		<div class="main-body">
			<div class="row">
				<?php include('sidebar.php'); ?>
				<?php include('approve_payment.php'); ?>
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body" style="padding:5px; height: 470px; overflow-y:scroll ;">
									<fieldset>
										<legend>Ended Reservations </legend>
										<table class="table table-condensed table-responsive">
											<tr>
												<th>Date</th>
												<th>Type</th>
												<th>Name</th>
												<th>Invoice No.</th>
												<th>Duration<br>(Days)</th>
												<th>Price (₦)</th>
												<th>Reservation <br>Code</th>
											</tr>
<?php
$sql2="SELECT * FROM reservations WHERE status='Ended' ORDER BY id DESC ";
$result2=mysql_query($sql2);
$count=mysql_num_rows($result2);
while($rows=mysql_fetch_assoc($result2)){
?>
											<tr>
												<td><?php echo $rows['date'];  ?></td>
												<td><?php echo $rows['reserve_type'];  ?></td>
												<td><?php echo $rows['reserve_name'];  ?></td>
												<td><?php echo $rows['invoice'];  ?></td>
												<td><?php echo $rows['duration'];  ?></td>
												<td><?php echo $rows['price'];  ?></td>
												<td><?php echo $rows['reserve_code'];  ?></td>
												<td><a href="view_reservation.php?id=<?php echo $rows['id'];  ?>">View</a></td></a>
											</tr>
<?php
}
?>
											<tr>
												<td colspan="8"><b>Total Ended Reservations: <?php echo $count;  ?></b></td>
											</tr>
										</table>
									</fieldset>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<style type="text/css">
body{
    background: #f7f7ff;
    margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: .5rem!important;
}
</style>



