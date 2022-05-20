<?php
require '../account/config/db.php';
require  '../account/modules/script.php';

$database = new Database;

$db = $database->connect();
$data = new User($db);

// print_r($data->getByEmail('agentcor@gmail.com')->email).'<br>';
// print_r($data->getByEmail('agentcor@gmail.com')->password).'<br>';
// print_r($data->getByEmail('agentcor@gmail.com')->user_id);
// echo $data->emailExist('@gmai');

if(isset($_POST['nemail'])){
    $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $email      = $post['email'];
    if(!$data->emailExist($email)){
        $error =  "<p style='background:red;padding:10px;color:white;'>User not found.</p>";
    }else{
         $data->sendRegForgot($email);
         $error =  "<p style='background:green;padding:10px;color:white;'>Your password/PIN has been sent to your registered email address.</p>";
    }
}
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Forgot Password or PIN</title>
	<!-- including stylesheets -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/core.css">
	<link rel="stylesheet" href="css/theme.css">
	<!-- including layerslider stylesheets -->
	<link rel="stylesheet" href="css/layerslider.css">
     	<link rel="stylesheet" href="css/skin.css">
	<!-- including colorpicker stylesheets -->
	<link href="css/colorpicker.css" rel="stylesheet" type="text/css">
</head>
<body>
	
	<div class="site-wrapper">
		<header class="site-header">
		
			
			<div class="nav-wrap">
				<div class="container">
					<div class="site-logo retina">
							<a href="">
							<img class="img-responsive" src="images/1604589904d41d8cd98f00b204e9800998ecf8427e.jpg" alt="">
						</a>
					</div>
									<button class="navbar-toggle" type="button">
			        	<span class="sr-only">Toggle navigation</span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			      	</button>
					<nav class="site-navigation">
					<ul>
					   <li><a href="https://affinityotb.com/" target="_blank">Home</a></li>
					   <li><a href="https://affinityotb.com/login/index.htm" >Login</a></li>
					</ul>
					</nav>
				</div>
			</div>
			
		</header>
		<!-- layer slider -->
          
         
        
          
 <div class="container">
          <div class="row">
          <div class="col-md-12">
		<div class=" forgotform">
<h3>Forgot Password or PIN</h3>
<p>If you have forgotten your password/PIN, please enter your correct account number below.
A password/PIN will be sent to your registered email address.</p>
<div class="coustologin">
<div class="custmoheading">
    <?php
        if(isset($error)){
            echo $error;
        } 
    ?>
    <br>
    <br>
</div>
<form method="post" action="" >
<div class="custmofild newcustidfid">
<label>Email: </label>

<input value="" placeholder="" type="text" name="email">
</div>


<input class="loginbutt2" name="nemail" value="Send Email" type="submit">

</form>
<p style="color:#727272;">
Click here to login to your Account 
<a href="index.htm">Login Now </a>
</p>
</div>
</div>
          </div>
      </div>
	
		</div>
	<footer class="site-footer">
			<div class="copyright-footer text-center">
				<div class="container">
					<div class="row">
					2020 © All Rights Reserved 
					</div>
				</div>
			</div>
		</footer>
	<!-- including scripts -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap/tab.js"></script>
	<script src="js/theme.js"></script>
	<script src="js/bootstrap/alert.js"></script>
	<script src="js/smoothscroll.js"></script>
	<!-- including layerslider scripts -->
	<script src="js/greensock.js"></script>
     
    <script src="js/layerslider.transitions.js"></script>
    <script src="js/layerslider.kreaturamedia.jquery.js"></script>
	<script type="text/javascript">
	    $(document).ready(function(){
	        $('#layerslider').layerSlider({
	 			skin 				: 'altus',
            	skinsPath 			: 'css/skins/',
            	responsiveUnder		: 1200,
            	layersContainer 	: 1200,
            	responsive 			: false,
            	showCircleTimer 	: false,
            	thumbnailNavigation : 'disabled',
            	navStartStop		: false,
	        });
	    });
	</script>
	
    	
    
     </div></body>
</html>