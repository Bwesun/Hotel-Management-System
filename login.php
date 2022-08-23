<?php
session_start();

if(isset($_SESSION['user_id'])){
  echo "<script>
    window.open('profile.php','_self');
</script>
            ";
}
include('head.php');

?>
<?php
if(isset($_POST['sub_login'])){

  include('connect.php');

  $username=$_POST['username'];
  $password=$_POST['password'];

  //echo $email." <br>";
  /*echo $password." <br>";

  if($db_conn){
    echo "DB COnnect Success! <br>";
  }
  echo "It worked!";
  */

  $username=stripslashes($username);
  $password=stripslashes($password);

  $sql="SELECT * FROM users WHERE username='$username' AND password='$password' ";
  $result=mysql_query($sql);

  $count=mysql_num_rows($result);

  if($count==1){
    $_SESSION['username']=$username;

    $rows=mysql_fetch_assoc($result);



    if($rows['role']=='admin'){
      $_SESSION['admin_id']=$rows['id'];
      $_SESSION['name']=$rows['username'];
      echo "<script>window.open('adm/index.php', '_self')</script>";
    }else{
      $_SESSION['user_id']=$rows['id'];
      $_SESSION['name']=$rows['username'];
      echo "<script>window.open('index.php', '_self')</script>";
    }
    //echo $sql." Error: ".mysql_error();
    

  }else{
    echo "<script>alert('Incorrect Username or Password! Please try again!')</script>";
    //echo "<script>window.open('login.php', '_self')</script>";
    echo $sql." Error: ".mysql_error();
  }

}
?>
<title>Login</title>
<div class="container bootstrap snippets bootdey">
  <div class="row">

    <div class="main">
      <h3>EMERALD HOTELS AND SUITES</h3>
      <h3>User Login</h3>

      <form role="form" method="post">
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
          <a class="pull-right" href="#">Forgot password?</a>
          <label>Password</label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="checkbox pull-right">
          <label>
            
            Don't have an Account, <a href="register.php">Sign Up</a></label>
        </div>
        <input type="submit" name="sub_login" class="btn btn btn-primary" value="Log In">

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
    max-width: 420px;
    margin: 0 auto;
    padding: 15px;
    box-shadow: 1px 0px 5px 1px;
    border-radius: 10px;
  }
  .span-or {
    display: block;
    position: absolute;
    left: 50%;
    top: -2px;
    margin-left: -25px;
    background-color: #fff;
    width: 50px;
    text-align: center;
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