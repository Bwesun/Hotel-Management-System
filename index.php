
<?php
session_start();
include('head.php');

?>
<style>
    body{
    background:linear-gradient(to left, rgba(0,0,0,0.9), rgba(0,0,0,0.5)), url("bg.jpg") no-repeat fixed center;
    background-size: cover;
}
     #center-content>a{
        font-size: 24px;
        border: 2px solid white;
        color: white;
        font-family: serif;
        font-weight: bolder;
        border-radius: 4px;
    }
    #center-content>a:hover{
        background-color: white;
        transition: all 0.5s ease;
        font-size: 24px;
        border: 2px solid #b54e04;
        opacity: 0.9;
        color: #b54e04;
    }
    #center-content{
        margin-top: 10%;
        color: white;
    } 
#welcome{
    transition: all 0.5s ease;
    -webkit-box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.75);
    box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.75);
    border-radius: 10px;
    margin-top: 15%;
    padding:10px;
    font-family: sans-serif;
    }
#welcome>.col-md-4{
    border-right: 1px solid blue;
}
#welcome>.col-md-4>h3{
    color:  blue;
}
.text-center{
    box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.75);
}
.panel {
    border-radius: 0;
    border: 0;
    margin-bottom: 24px;
}
.panel:hover{
    box-shadow: 0px 0px 2px 0px rgba(0,0,0,0);
}
.pad-all {
    padding-bottom: 10px;
}
#center-link{
    padding: 10px;
}
</style>
 <div class="row" align="center">
                <div class="col-lg-12" style="margin-bottom: 10%;">
                    
                    <div id="center-content">
                        
                        <h5>We provide Quality and Efficient Services to fit your Taste and Comfort</h5>
                        <br>
                        <br><br>
<?php
if(isset($_SESSION['user_id'])){
    echo '<a id="center-link" class="btn" href="reserve.php">GET STARTED</a> ';
 
}else{
    echo '<a id="center-link" class="btn" href="login.php">GET STARTED</a> ';
}
?>
                    </div>
                    
                </div>
            </div>
<?php
include('footer.php');

?>