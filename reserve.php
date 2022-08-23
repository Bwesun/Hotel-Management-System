<?php
session_start();

if(!isset($_SESSION['user_id'])){
  echo "<script>
    window.open('login.php','_self');
    </script>
            ";
}
include('head.php');

?>
<title>Make Reservation</title>
<div class="container bootstrap snippets bootdey">
  <div class="row">

      <h3>MAKE RESERVATION</h3>
      <div class="col-md-6">
              <h4>Select Reservation Type:</h4>
                
                <table cellspacing="3" cellpadding="3" align="center">
                  <tr>
                    <?php
                  include('connect.php');

                  $sql="SELECT * FROM reserve_type "; 
                  $result=mysql_query($sql);
                  while($rows=mysql_fetch_assoc($result)){

                ?>
                    
                <form method="post">
                  <input type="hidden" name="reserve_type" value="<?php echo $rows['name']; ?>">
                  <input type="hidden" name="reserve_type_id" value="<?php echo $rows['id']; ?>">
                <input type="submit" class="btn btn-primary" value="<?php echo $rows['name']; ?> - <?php echo $rows['description']; ?>" name="sub_reserve" ><br>
                </form>  
                <?php 
                  }
                  ?>
                  </tr></table>
<?php

if(isset($_POST['sub_reserve'])){
  $name=$_POST['reserve_type'];
   $sql2="SELECT * FROM reserve_type WHERE name='$name' "; 
   $result2=mysql_query($sql2);
   $row=mysql_fetch_assoc($result2);
   $reservation_name=$row['name'];


   echo "<h4> Reservation Type: <b>".$_POST['reserve_type']." - ".$row['description']." </b></h4>";
   echo "<h5>Available Space: <b>".$row['available_no']."</h5>" ; echo $_POST['name']."</b>";
   ?>
   
   <table class="table table-condensed table-striped table-responsive">
    <tr>
      <th colspan="2" align="center">OCCUPIED DATES</th>
    </tr>
     <tr>
       <th>From:</th>
       <th>To:</th>
     </tr>
  <?php 
    $sql3="SELECT * FROM reservations WHERE reserve_type='$reservation_name' ";
    $result3=mysql_query($sql3);
    while($rw=mysql_fetch_assoc($result3)){
  ?>
     <tr>
       <td><?php echo $rw['start_date']; ?></td>
       <td><?php echo $rw['end_date']; ?></td>
     </tr>
     <?php
        }echo "</table> </div> <div class='col-md-6'>" ;

      if($row['available_no']<1){
        echo "<script>alert('Sorry, there is no free space!')</script>";
      }else{
        echo '<form role="form" action="reserve_ac.php" method="post">
        <table class="table table-condensed form-group">
          <tr>
            <th>Reservation Name</th>
            <td><input type="text" name="name" class="form-control" placeholder="Enter Fullname (Surname First)"></td>
          </tr>
          <tr>
            <th>Duration (Days)</th>
            <td><input type="text" name="duration" class="form-control" placeholder="Enter Duration in Days"></td>
          </tr>
          <tr>
            <th>Start Date</th>
            <td><input type="date" name="start_date" class="form-control"></td>
          </tr>
          <tr>
            <th>End Date</th>
            <td><input type="date" name="end_date" class="form-control"</td>
          </tr>
          <tr>
            <th>Purpose</th>
            <td><input type="text" name="purpose" class="form-control" placeholder="Why are you making this Reservation?"></td>
          </tr>
          <tr>
            <td colspan="2">
              <input type="hidden" name="type" value="'.$reservation_name.'">
              <input type="submit" name="" class="form-control btn btn-primary" value="Make Reservation">
            </td>
          </tr>
        </table>
      </form></div>';
      } 
      }
      ?>


    </div>
  </div>

</div>

<style type="text/css">
  body {
    padding-top: 15px;
    font-size: 12px
  }
  .main {
    margin: 0 auto;
    padding: 15px;
    box-shadow: 1px 0px 5px 1px;
    border-radius: 10px;
  }
  h3 {
    text-align: center;
    line-height: 200%;
  }
</style>

<br>
<?php
include('footer.php');

?>