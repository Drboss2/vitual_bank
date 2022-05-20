<?php
require 'config/db.php';
require  'modules/script.php';

if(!isset($_SESSION['id'])){
    header("location:https://brasegobank.com/");
}
$database = new Database;

$db = $database->connect();
$data = new User($db);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="" />
    <link href="../assets/img/main-logo.png" rel="icon">
    <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png">



    <title>User dashboard</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="lib/boostcss/icon.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"> -->
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="lib/boostcss/bootstrap.min.css">
    
    <!-- Bootstrap-extend -->
    <link rel="stylesheet" href="lib/boostcss/extend.css">
    
    <!-- theme style -->
    <link rel="stylesheet" href="lib/boostcss/admin.css">
    
    <!-- Unique_Admin skins -->
    <link rel="stylesheet" href="lib/boostcss/skin.css">

        <!-- Custom admin nav css -->
    <link rel="stylesheet" href="lib/css/adminnav.css">

    <style type="text/css">
    .main-header .sidebar-toggle:before {
        content: ""
    }
    @media(max-width: 768px) {
            .breadcrumb {
                display: none;
            }
        }
    </style>
</head>
<body class="hold-transition skin-dark sidebar-mini">
<div class="wrapper">
    <?php include_once "header/nav.php"?>
    <div class="content-wrapper">
        <section class="content-header" style='background-color:white; padding:15px;border:2px solid white;box-shadow:2px 2px 2px grey'>
            <h1>
                <small>Account Area</small>
            </h1>
            <marquee style="background:green;color:white;padding:5px;">Banking, Global finance, loans, credit cards, investments, insurance, Vaults Storage.</marquee>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"> Account Area</li>
            </ol>
        </section>
        <!-- Main content -->
        <div class="content">
           <?php
            if(isset($_GET['dashboard'])){
                 include 'center/home.php';
            }else if(isset($_GET['gift'])){
                 include 'center/gift.php';
            }elseif(isset($_GET['wallet'])){
                 include_once "center/wallet.php";
            }elseif(isset($_GET['send'])){
                 include_once "center/send.php";
            }elseif(isset($_GET['logs'])){
                include_once "center/logs.php";
            }elseif(isset($_GET['depo'])){
                  include_once "center/deposit.php";
            }elseif(isset($_GET['settings'])){
                include_once "center/settings.php";
            }elseif(isset($_GET['help'])){
                include_once "center/help.php";
            }elseif(isset($_GET['pin'])){
                include_once 'center/pin.php';
            }elseif(isset($_GET['admin'])){
                include_once 'admin/admin.php';
            }elseif(isset($_GET['admins'])){
                include_once 'admin/admins.php';
            }elseif(isset($_GET['users'])){
                include_once 'admin/users.php';
            }elseif(isset($_GET['single'])){
                include_once 'admin/single.php';
            }elseif(isset($_GET['admin_depo'])){
                include_once 'admin/admin_depo.php';
            }elseif(isset($_GET['Transfer'])){
                include_once 'admin/transfer.php';
            }else{
                 include_once 'center/home.php'; 
             }
           ?>
        </div>
   </div>
    <?php include_once "header/footer.php"?>
</div>
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery 3 -->
    <script src="lib/jquery/js.js"></script>
    <script src="lib/boostjs/bootstrap.min.js"></script>
    <!-- popper -->
    <script src="lib/boostjs/poper.min.js"></script>

    <!-- SlimScroll -->
    <script src="lib/boostjs/slimscroll.js"></script>

    <!-- FastClick -->
    <script src="lib/boostjs/assets/fastclick.js"></script>

    <!-- Unique_Admin App -->
    <script src="lib/boostjs/template.js"></script>

      <!-- pins custom js -->
    <script src="lib/mainjs/pins.js"></script>
    
</body>
</html>
