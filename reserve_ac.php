<?php
session_start();
  include('connect.php');

  $use_id=$_SESSION['user_id'];
  $name=$_POST['name'];
  $type=$_POST['type'];
  $duration=$_POST['duration'];
  $start_date=$_POST['start_date'];
  $end_date=$_POST['end_date'];
  $purpose=$_POST['purpose'];
  $status='Pending';
  $date=date("d/m/Y");

  $code=mt_rand();
  $code=substr($code, 1);
  $reserve_code='E'.$code.'H'; //Reservation Code

  $invoice=mt_rand();
  $invoice=substr($invoice, 5);
  $invoice='#'.$invoice; //Invoice No.

  //Getting the User E-mail fro Database
  $sql7="SELECT * FROM users WHERE id='$use_id' ";
  $result7=mysql_query($sql7);
  $r=mysql_fetch_assoc($result7);
  $email=$r['email'];

  //Calculating the total amount
  $sql2="SELECT * FROM reserve_type WHERE name='$type' ";
  $result2=mysql_query($sql2);
  $row=mysql_fetch_assoc($result2);
  $reserve_type_id=$row['id'];
  $available_no=$row['available_no'];//Available Space in Reserve Type
  $total_no=$row['total_no'];//Total Space in Reserve Type
  $amount=$row['amount'];
  $price=$duration*$amount;

  //echo $email." <br>";
  /*echo $password." <br>";

  if($db_conn){
    echo "DB COnnect Success! <br>";
  }
  echo "It worked!";
  */
  ?>
  <head>
      <meta charset="utf-8">
      <meta name="key" content="pk_test_cecc8a1eba6e8f3cb1e34373a84d344ce36fb95c">
      <meta name="email" content="<?php echo $email;  ?>">
      <meta name="amount" content="<?php echo $price;  ?>">
      <meta name="ref" content="<?php echo $reserve_code;  ?>">
      <meta name="label" content="<?php echo $name;  ?>">
  </head>
  <title>Reservation Receipt</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="jquery.min.js"></script>
            <link href="bootstrap.min.css" rel="stylesheet">
            <script src="bootstrap.min.js"></script>
<?php 
if($available_no<1){
    echo "Available: ".$available_no;
    echo "<script>alert('There is no available Room for this Reservation Type! Please try other Reservation Type!')</script>";
    echo "<script>window.open('reserve.php', '_self')</script>";
}else{
    $sql3="SELECT * FROM reservations WHERE reserve_type='$type' AND user_id!='$use_id' ";
    $result3=mysql_query($sql3);
    //echo $sql3;
    while($row=mysql_fetch_assoc($result3)){
        if($row['start_date']>=$start_date && $row['end_date']){
            echo "<script>alert('Sorry! This Date has been taken! Please try other Dates!')</script>";
            echo "<script>window.open('reserve.php', '_self')</script>";
            break; 
            }
            break;
        }
        if($start_date>$row['start_date'] || $end_date<$row['start_date']){
              $sql="INSERT INTO reservations(user_id, reserve_name, reserve_type, duration, start_date, end_date, purpose, reserve_code, status, date, price, invoice)VALUES('$use_id', '$name', '$type', '$duration', '$start_date', '$end_date', '$purpose', '$reserve_code','$status', '$date', '$price', '$invoice')  ";
              $result=mysql_query($sql);

              if($result){
                echo "<script>alert('Your Reservation is Successful! Pay in the next 3 days or reservation will be terminated!')</script>";
                //echo $sql." Error: ".mysql_error();
                $new_number=$available_no-1;
                $sql4="UPDATE reserve_type SET available_no='$new_number' WHERE id='$reserve_type_id' ";
                $result4=mysql_query($sql4);
                ?>
                <meta charset="utf-8">

<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block" align="center">
                                        <h2>Reservation Successful!<br><small>Make Your Payment to Activate Reservation<br>Non payment within 3 days will result to Termination of Reservation</small></h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody><tr>
                                                <td><?php echo $name; ?><br>Invoice <?php echo $invoice; ?><br> <?php echo $date; ?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                            <td>Reservation Type</td>
                                                            <td class="alignright"><?php echo $type; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Duration</td>
                                                            <td class="alignright"><?php echo $duration; ?> Days</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Start Date</td>
                                                            <td class="alignright"><?php echo $start_date; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>End Date</td>
                                                            <td class="alignright"><?php echo $end_date; ?></td>
                                                        </tr>
                                                        <tr class="total">
                                                            <td class="" width="80%">Price</td>
                                                            <td class="alignright"><?php echo '₦ '.number_format($price); ?></td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
<form id="paymentForm">
    <input type="hidden" value="<?php echo $email  ;?>" id="email-address" required />
    <input type="hidden" value="<?php echo $price  ;?>" id="amount" required />
    <input type="hidden" value="<?php echo $name  ;?>" id="name" />
    <input type="hidden" value="<?php echo $reserve_code  ;?>" id="ref" />

  <div class="form-submit">
    <input type="submit" onclick="payWithPaystack()" class="btn btn-success form-control" value="Pay Now">
  </div><br>
</form>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block" align="center">
                                        <a href="" class="btn btn-primary btn-sm" onclick="window.print()">Print</a> | <a href="index.php" class="btn btn-primary btn-sm">Home</a> | <a href="profile.php" class="btn btn-primary btn-sm">Profile</a> 
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block" align="center">
                                        Emerald Hotel and Suite &copy; 2021
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <div class="footer">
                    <table width="100%">
                        <tbody><tr>
                            <td class="aligncenter content-block">Questions? Email <a href="mailto:">support@emeraldhotels.inc</a></td>
                        </tr>
                    </tbody></table>
                </div></div>
        </td>
        <td></td>
    </tr>
</tbody></table>
<?php 

              }else{
                echo "<script>alert('Reservation not Successful! Please try again!')</script>";
                echo "<script>window.open('reserve.php', '_self')</script>";
                //echo $sql." Error: ".mysql_error();
              }
    }
}



?>
    

<style type="text/css">
/* -------------------------------------
    GLOBAL
    A very basic CSS reset
------------------------------------- */
* {
    margin: 0;
    padding: 0;
    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    box-sizing: border-box;
    font-size: 14px;
}

img {
    max-width: 100%;
}

body {
    -webkit-font-smoothing: antialiased;
    -webkit-text-size-adjust: none;
    width: 100% !important;
    height: 100%;
    line-height: 1.6;
}

/* Let's make sure all tables have defaults */
table td {
    vertical-align: top;
}

/* -------------------------------------
    BODY & CONTAINER
------------------------------------- */
body {
    background-color: #f6f6f6;
}

.body-wrap {
    background-color: #f6f6f6;
    width: 100%;
}

.container {
    display: block !important;
    max-width: 600px !important;
    margin: 0 auto !important;
    /* makes it centered */
    clear: both !important;
}

.content {
    max-width: 600px;
    margin: 0 auto;
    display: block;
    padding: 20px;
}

/* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */
.main {
    background: #fff;
    border: 1px solid #e9e9e9;
    border-radius: 3px;
}

.content-wrap {
    padding: 20px;
}

.content-block {
    padding: 0 0 20px;
}

.header {
    width: 100%;
    margin-bottom: 20px;
}

.footer {
    width: 100%;
    clear: both;
    color: #999;
    padding: 20px;
}
.footer a {
    color: #999;
}
.footer p, .footer a, .footer unsubscribe, .footer td {
    font-size: 12px;
}

/* -------------------------------------
    TYPOGRAPHY
------------------------------------- */
h1, h2, h3 {
    font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    color: #000;
    margin: 40px 0 0;
    line-height: 1.2;
    font-weight: 400;
}

h1 {
    font-size: 32px;
    font-weight: 500;
}

h2 {
    font-size: 24px;
}

h3 {
    font-size: 18px;
}

h4 {
    font-size: 14px;
    font-weight: 600;
}

p, ul, ol {
    margin-bottom: 10px;
    font-weight: normal;
}
p li, ul li, ol li {
    margin-left: 5px;
    list-style-position: inside;
}

/* -------------------------------------
    LINKS & BUTTONS
------------------------------------- */
a {
    color: #1ab394;
    text-decoration: underline;
}

.btn-primary {
    text-decoration: none;
    color: #FFF;
    background-color: #1ab394;
    border: solid #1ab394;
    border-width: 5px 10px;
    line-height: 2;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
    display: inline-block;
    border-radius: 5px;
    text-transform: capitalize;
}

/* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
------------------------------------- */
.last {
    margin-bottom: 0;
}

.first {
    margin-top: 0;
}

.aligncenter {
    text-align: center;
}

.alignright {
    text-align: right;
}

.alignleft {
    text-align: left;
}

.clear {
    clear: both;
}

/* -------------------------------------
    ALERTS
    Change the class depending on warning email, good email or bad email
------------------------------------- */
.alert {
    font-size: 16px;
    color: #fff;
    font-weight: 500;
    padding: 20px;
    text-align: center;
    border-radius: 3px 3px 0 0;
}
.alert a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
}
.alert.alert-warning {
    background: #f8ac59;
}
.alert.alert-bad {
    background: #ed5565;
}
.alert.alert-good {
    background: #1ab394;
}

/* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
.invoice {
    margin: 40px auto;
    text-align: left;
    width: 80%;
}
.invoice td {
    padding: 5px 0;
}
.invoice .invoice-items {
    width: 100%;
}
.invoice .invoice-items td {
    border-top: #eee 1px solid;
}
.invoice .invoice-items .total td {
    border-top: 2px solid #333;
    border-bottom: 2px solid #333;
    font-weight: 700;
}

/* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
@media only screen and (max-width: 640px) {
    h1, h2, h3, h4 {
        font-weight: 600 !important;
        margin: 20px 0 5px !important;
    }

    h1 {
        font-size: 22px !important;
    }

    h2 {
        font-size: 18px !important;
    }

    h3 {
        font-size: 16px !important;
    }

    .container {
        width: 100% !important;
    }

    .content, .content-wrap {
        padding: 10px !important;
    }

    .invoice {
        width: 100% !important;
    }
}

</style>
<script type="text/javascript">
const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();
  let handler = PaystackPop.setup({
    key: 'pk_test_cecc8a1eba6e8f3cb1e34373a84d344ce36fb95c', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    ref: document.getElementById("ref").value, //''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    label: document.getElementById("name").value,
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
    }
  });
  handler.openIframe();
}

//Initialize Transaction
var paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener('submit', payWithPaystack, false);
function payWithPaystack() {
  var handler = PaystackPop.setup({
    key: 'pk_test_cecc8a1eba6e8f3cb1e34373a84d344ce36fb95c', // Replace with your public key
    email: document.getElementById('email-address').value,
    amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
    currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
    ref: document.getElementById("ref").value, // Replace with a reference you generated
    callback: function(response) {
      //this happens after the payment is completed successfully
      var reference = response.reference;
      alert('Payment complete! Reference: ' + reference);
      // Make an AJAX call to your server with the reference to verify the transaction
    },
    onClose: function() {
      alert('Transaction was not completed, window closed.');
    },
  });
  handler.openIframe();
}

//Callback Function
callback: function(response) {
  window.location = "http://emeraldhotelzaria.censono.com.ng/validate_payment.php?reference=" + response.reference;
};
// On the redirected page, you can call Paystack's verify endpoint.
</script>

<script src="https://js.paystack.co/v1/inline.js"></script> 