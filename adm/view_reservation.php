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
								<div class="card-body" style="padding: 20px;">
<?php

$sql2="SELECT * FROM reservations WHERE id='".$_GET['id']."' ORDER BY id DESC ";
$result2=mysql_query($sql2);
$count=mysql_num_rows($result2);
$rows=mysql_fetch_assoc($result2);
?>
									<fieldset>
										<legend>Reservation <?php echo $rows['reserve_code'];  ?> - <?php echo $rows['reserve_name'];  ?> - <?php echo $rows['invoice'];  ?></legend>
										<table class="table table-condensed table-responsive">
											<tr>
												<th>Date</th>
												<td><?php echo $rows['date'];  ?></td>
											</tr>
											<tr>
												<th>Type</th>
												<td><?php echo $rows['reserve_type'];  ?></td>
											</tr>
											<tr>
												<th>Name</th>
												<td><?php echo $rows['reserve_name'];  ?></td>
											</tr>
											<tr>
												<th>Invoice No.</th>
												<td><?php echo $rows['invoice'];  ?></td>
											</tr>
											<tr>
												<th>Duration</th>
												<td><?php echo $rows['duration'];  ?> Days<br>From <b><?php echo $rows['start_date'];?> to <?php echo $rows['end_date'];  ?></b> </td>
											</tr>
											<tr>
												<th>Reservation Code</th>
												<td><?php echo $rows['reserve_code'];  ?></td>
											</tr>
											<tr>
												<th>Price</th>
												<td>₦<?php echo number_format($rows['price']);  ?></td>
											</tr>
											<tr>
												<th>Status</th>
												<td><?php echo $rows['status'];  ?></td>
											</tr>
<?php

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
        echo "<script>window.open('index.php', '_self')</script>";
	}
}

if(isset($_POST['sub_approve'])){
	$sql6="UPDATE reservations SET status='Approved' WHERE id='".$_POST['record_id']."' ";
	$result6=mysql_query($sql6);

	if($result6){
		$sql8="SELECT * FROM reserve_type WHERE name='".$_POST['reserve_type']."' ";
		$result8=mysql_query($sql8);
		$rw=mysql_fetch_assoc($result8);
		$available_no=$rw['available_no'];
		$new_available_no=$available_no-1;
		//echo $sql8." Err: ".mysql_error();
		//echo $sql6." Err: ".mysql_error();
		//echo $available_no." Err: ".mysql_error();

		$sql7="UPDATE reserve_type SET available_no='$new_available_no' WHERE id='".$rw['id']."' ";
		$result7=mysql_query($sql7);
		//echo $sql7." Err: ".mysql_error();

		echo "<script>alert('Reservation Approved Successfully!')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
	}
}

if(isset($_POST['sub_end'])){
	$sql6="UPDATE reservations SET status='Ended' WHERE id='".$_POST['record_id']."' ";
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

		echo "<script>alert('Reservation Ended Successfully!')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
	}
}

?>
											<tr>
												<td colspan="2">
													<div align="center">
													<?php 
														if($rows['status']=='Pending'){
															?><form method="post">
														<input type="hidden" name="record_id" value="<?php echo $rows['id'];  ?>">
														<input type="hidden" name="reserve_type" value="<?php echo $rows['reserve_type'];  ?>">
														<input type="submit" name="sub_approve" value="Approve" class="btn btn-success btn-sm">
														<input type="submit" name="sub_cancel" value="Cancel" class="btn btn-danger btn-sm">
													</form>
													<?php
														}
														if($rows['status']=='Approved'){
															?><form method="post">
														<input type="hidden" name="record_id" value="<?php echo $rows['id'];  ?>">
														<input type="hidden" name="reserve_type" value="<?php echo $rows['reserve_type'];  ?>">
														<input type="submit" name="sub_end" value="End Reservation" class="btn btn-primary btn-sm">
													</form>
													<?php
														}
													?>
													</div>
												</td>
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

