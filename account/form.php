<?php
 require '../config/db.php';
require  '../modules/script.php';

 if(!$_SESSION['id']){
     header("location:login");
 }

$database = new Database;

$db = $database->connect();

$data = new User($db);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">

  <!-----   icon    --->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v4.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
  <!-- ======= Header ======= -->
    <?php require '../head/header.php'?>
    <br>
    <section class='type'>
        <div class="container mt-5 ">
            <div class="row">
                <div class="col-lg-12 mb-2">
                    <a href='account/dashboard?gift'class="text-primary" style="font-family: 'Open Sans', sans-serif;font-size:14px;">Redeem G-token</a> | <a href='account/dashboard?wallet=wallet' style="font-family: 'Open Sans', sans-serif;font-size:14px;" class="text-primary">Withdraw</a> | <a href='account/dashboard?send=send'class="text-primary" style="font-family: 'Open Sans', sans-serif;font-size:14px;">Transfer</a> |
                    <a class='text-primary' href='merchant/dashboard?buy=buy' style="font-family:'Open Sans',sans-serif;font-size:14px;">Buy G-token</a> |
                    <a  class='text-primary'   style="font-family: 'Open Sans', sans-serif;font-size:14px;" class='text-dark' href='merchant/dashboard?my=my'>Gift G-token</a> |
                    <a class='text-primary' href='merchant/dashboard?my=my' style="font-family:'Open Sans',sans-serif;font-size:14px;">My G-token</a>
                </div>
                <div class="col-lg-6 mb-2">
                    <div class="card">
                        <div class='card-header bg-primary text-light'>Customer Wallet Dashboard</div>
                            <div class="card-body" style='padding:40px;'>
                                <span class="card-text"  style="font-family: 'Open Sans', sans-serif;font-size:14px;">G-wallet Balance</span>:₦<?php echo $data->getWalletBalance('wallet') ?><br>
                                <span class="card-text"  style="font-family: 'Open Sans', sans-serif;font-size:14px;">G-Tokens Redeemed:<?php echo $data->getWalletBalance('tokens') ?></span>
                            </div>
                        <div class='card-header'>
                            <a class='btn btn-outline-primary' href='account/dashboard'>Wallet Dashboard</a>
                            <a class='btn btn-outline-danger' href='account/dashboard?wallet=wallet'>Withdraw</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class='card-header bg-dark text-light'>Merchant Dashboard</div>
                            <div class="card-body" style='padding:40px'>
                                <span class="card-text"  style="font-family: 'Open Sans', sans-serif;font-size:14px;">Available G-Token</span>:<?php echo $data->getMerchantBalance()?><br>
                                <span class="card-text"style="font-family: 'Open Sans', sans-serif;font-size:14px;">Available Lp-Token</span>:<?php 
                                if($data->getLptokenBalance() == '0'){
                                    echo 0;
                                }else{
                                    echo $data->getLptokenBalance();
                                }
                                ?>
                            </div>
                        <div class='card-header'>
                            <a class='btn btn-outline-primary' href='merchant'>Merchant Dashboard</a>
                            <a class='btn btn-outline-danger' href='merchant/dashboard?my=my'>Gift G-token</a>

                        </div>
                    </div>
                </div>
              
            </div>
             <div class="mt-3">
                <div class='text-center box border' style='padding:25px;font-size:14px;'> 
                <span style='font-size:16px;font-weight:bold'>Refer And Earn</span><br>
                    Refer Businesses To GivenReward And Earn Commission<br>
                    for life On All Their Token Purchases And Raffle Draws wins
                    <div class="input-group mt-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="copy" value="http://localhost/marketing/join?ref=<?php echo $_SESSION['id'] ?> "readonly>
                            <div class="input-group-append">
                                <span class="input-group-text" onclick="cot()" style='cursor:pointer'>copy</span>
                            </div>
                        </div>
                    </div>
                <div class="share-button">
                    <a class="btn btn-primary btn-sm" onclick="javascript:fb(['http://www.facebook.com/sharer.php?u=http://localhost/marketing/join?ref=<?php echo  $_SESSION['id'] ?>' ])" href="javascript:void(0)"> <i class="fa fa-facebook-f"></i></a>&nbsp; 
                    <a class="btn btn-info btn-sm" onclick="javascript:twitter('http://twitter.com/share?text=givencash&url=http://localhost/marketing/join?ref=<?php echo $_SESSION['id']  ?> ')" href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
                    <a class="btn btn-success btn-sm" href="https://api.whatsapp.com/send?text=http://localhost/marketing/join?ref=<?php echo $hash ?> " target="_blank"> <i class="fa fa-whatsapp"></i></a>
                </div>
                </div>
               <script>
                    function cot(){
                        var copy = document.getElementById("copy");
                        copy.select();
                        copy.setSelectionRange(0,99999);
                        document.execCommand("copy");
                        alert("Referral click has been copied");
                    }
                    
                    function fb(url){
                        window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
                        return true;
                    }
                    function twitter(url){
                        window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
                        return true;
                    }
                
                </script>
            </div>
        </div>
    </section>
      <!-- ======= Header ======= -->
    <?php require '../head/footer.php'?>
   
</body>
</html>