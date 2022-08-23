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
	include('connect.php');
	include('head.php');

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
										<legend>Reservation Status Records </legend>
										<table class="table table-condensed table-responsive">
											<tr>
												<th>Date</th>
												<th>Type</th>
												<th>Name</th>
												<th>Invoice No.</th>
												<th>Duration<br>(Days)</th>
												<th>Price</th>
												<th>Code</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
<?php
$sql2="SELECT * FROM reservations ORDER BY id DESC ";
$result2=mysql_query($sql2);
$count=mysql_num_rows($result2);
while($rows=mysql_fetch_assoc($result2)){
?>
											<tr>
												<a href=""><td><?php echo $rows['date'];  ?></td>
												<td><?php echo $rows['reserve_type'];  ?></td>
												<td><?php echo $rows['reserve_name'];  ?></td>
												<td><?php echo $rows['invoice'];  ?></td>
												<td><?php echo $rows['duration'];  ?></td>
												<td><?php echo $rows['price'];  ?></td>
												<td><?php echo $rows['reserve_code'];  ?></td>
												<td>
													<?php 
														if($rows['status']=='Cancelled'){
															echo '<a class="btn btn-danger btn-sm">Cancelled</a>';
														}elseif($rows['status']=='Pending'){
															echo '<a class="btn btn-info btn-sm">Pending</a>';
														}elseif($rows['status']=='Ended'){
															echo '<a class="btn btn-default btn-sm">Ended</a>';
														}else{
															echo '<a class="btn btn-success btn-sm">Approved</a>';
														}
													?>												</td>
												<td><a href="view_reservation.php?id=<?php echo $rows['id'];  ?>">View</a></td></a>
											</tr>
<?php
}

if(isset($_POST['sub_cancel'])){
	$sql6="UPDATE reservations SET status='Cancelled' WHERE id='".$_POST['record_id']."' ";
	$result6=mysql_query($sql6);

	if($result6){
		$sql8="SELECT * FROM reserve_type WHERE name='".$_POST['reserve_type']."' ";
		$result8=mysql_query($sql8);
		$rw=mysql_fetch_assoc($result8);
		$available_no=$rw['available_no'];
		$new_available_no=$available_no+1;
		//echo $sql8." Err: ".mysql_error();
		//echo $sql6." Err: ".mysql_error();
		//echo $available_no." Err: ".mysql_error();

		$sql7="UPDATE reserve_type SET available_no='$new_available_no' WHERE id='".$rw['id']."' ";
		$result7=mysql_query($sql7);
		//echo $sql7." Err: ".mysql_error();

		echo "<script>alert('Reservation Cancelled Successfully!')</script>";
        echo "<script>window.open('profile.php', '_self')</script>";
	}
}
?>
											<tr>
												<td colspan="8"><b>Total Reservations: <?php echo $count;  ?></b></td>
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

<?php
	include('footer.php');
?>

