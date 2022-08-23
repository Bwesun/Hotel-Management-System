<?php
session_start();

include('head.php');

?>
<title>Register</title>
<div class="container bootstrap snippets bootdey">
  <div class="row">

    <div class="main">
      <h3>User Registration</h3>
<?php
if(isset($_POST['reg_sub'])){

  include('connect.php');

  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $gender=$_POST['gender'];
  $age=$_POST['age'];
  $address=$_POST['address'];
  $username=$_POST['username'];
  $password=$_POST['password'];

  //echo $email." <br>";
  /*echo $password." <br>";

  if($db_conn){
    echo "DB COnnect Success! <br>";
  }
  echo "It worked!";
  */

  $sql="INSERT INTO users(name, phone, email, gender, age, address, username, password, role)VALUES('$name', '$phone', '$email', '$gender', '$age', '$address', '$username', '$password', 'user') ";
  $result=mysql_query($sql);

  if($sql){
    echo "<script>alert('Registration Successful! You can now login!')</script>";
    echo "<script>window.open('login.php', '_self')</script>";
    //echo $sql." Error: ".mysql_error();
  }else{
    echo "<script>alert('Incorrect Username or Password! Please try again!')</script>";
    echo "<script>window.open('register.php', '_self')</script>";
    //echo $sql." Error: ".mysql_error();
  }

}
?>
      <form role="form" method="post">
        <table class="table table-condensed form-group">
          <tr>
            <th>Full Name</th>
            <td><input type="text" name="name" class="form-control" required placeholder="Enter Fullname (Surname First)"></td>
          </tr>
          <tr>
            <th>Phone Number</th>
            <td><input type="text" name="phone" class="form-control" required placeholder="Enter Phone Number"></td>
          </tr>
          <tr>
            <th>E-Mail</th>
            <td><input type="email" name="email" class="form-control" required placeholder="Enter Email"></td>
          </tr>
          <tr>
            <th>Gender</th>
            <td><input type="radio" name="gender" value="male"> Male   <input type="radio" name="gender" value="female"> Female</td>
          </tr>
          <tr>
            <th>Age</th>
            <td><input type="number" name="age" required class="form-control"></td>
          </tr>
          <tr>
            <th>Address</th>
            <td><textarea placeholder="Enter Address...." required name="address" class="form-control"></textarea></td>
          </tr>
          <tr>
            <th>Username</th>
            <td><input type="text" name="username" required class="form-control" placeholder="Enter New Username"></td>
          </tr>
          <tr>
            <th>Password</th>
            <td><input type="text" name="password" required class="form-control" placeholder="Enter New Password"></td>
          </tr>
          <tr>
            <td colspan="2">
              <input type="submit" name="reg_sub" class="form-control btn btn-primary" value="Register">
            </td>
          </tr>
        </table>
      </form>
    
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
