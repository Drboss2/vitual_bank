<header class="main-header" style="color:black;">
        <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a style='color:white;' href="#" class="sidebar-toggle fa fa-bars" data-toggle="push-menu" role="button"><span class="fa fa-bars"></span>
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
                <a style='color:white;margin-right:8px;' href="logout"  _data-toggle="dropdown">
                    Logout
                </a>
                
            </ul>
        </div>
    </nav>
</header>
<style>
    .a{
        background-color:black !important;
        color:white;
    }
</style>
<aside class="main-sidebar" >
    <!-- sidebar -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="ulogo">
            </div>
            <div class="info"  style='color:white;font-size:16px;'>
                <?php if(isset($_SESSION['img'])):?>
                   <img class="img-fluid" style="height:60px;width:60px;border-radius:50px;" src="images/<?php echo $_SESSION['img']?>">  
                <?php  endif;?>
            </div>
            <!-- sidebar menu -->
            <ul class="sidebar-menu" data-widget="tree">
            <?php if(isset($_SESSION['admin'])):?>
                <li>
                    <a href="dashboard?admin">
                        <i class="fa fa-home" style="color:white"></i> <span style="color:white">Home</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                </li>
                <?php if($_SESSION['admin'] == '2'):?>
                 <li class="<?php if(isset($_GET['admins'])) echo "a";?>">
                    <a href="dashboard?admins">
                        <i class="fa fa-users" style="color:white"></i> <span style="color:white">Admins</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                </li> 
                <?php endif;?>
                <li class="<?php if(isset($_GET['users'])) echo "a";?>">
                    <a href="dashboard?users">
                        <i class="fa fa-user" style="color:white"></i> <span style="color:white">Users</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                </li> 
                <li class="<?php if(isset($_GET['send'])) echo "a";?>">
                    <a href="dashboard?admin_depo=send">
                        <i class="fa fa-credit-card" style="color:white;"></i>
                        <span style="color:white">Deposit Request</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                </li>  
                  <li class="<?php if(isset($_GET['depo'])) echo "a";?>">
                    <a href="dashboard?Transfer=depo">
                        <i class="fa fa-credit-card" style="color:white;"></i>
                        <span style="color:white">Transfer Request</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                </li>
                <li class="">
                    <a href="logout">
                        <i class="fa fa-power-off" style="color:white"></i>
                        <span style="color:white">Logout</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                </li> 
            <?php else:?>
                <li>
                    <a href=""><span style="font-size:14px;color:white" class='text-bold'>ACCOUNT & TRANSACTIONS</span></a>
                </li>
                <li class="<?php if(isset($_GET['dashboard'])) echo "a";?>">
                    <a href="dashboard">
                        <i class="fa fa-dashboard" style="color:white"></i> <span style="color:white">Summary</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                </li> 
                <li class="<?php if(isset($_GET['send'])) echo "a";?>">
                    <a href="dashboard?send=send">
                        <i class="fa fa-credit-card" style="color:white;"></i>
                        <span style="color:white">Funds Transfer</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                </li>  
                  <li class="<?php if(isset($_GET['depo'])) echo "a";?>">
                    <a href="dashboard?depo=depo">
                        <i class="fa fa-check" style="color:white;"></i>
                        <span style="color:white"> Online Deposit</span>
                        <span class="pull-right-container">
                           <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                </li> 
                
                <li class="<?php if(isset($_GET['logs'])) echo "a";?>">
                    <a href="dashboard?logs=logs">
                        <i class="fa fa-history" style="color:white"></i>
                          <span style="color:white">Activity</span>
                          <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                </li> 
                <li>
                    <a href=""><span style="font-size:14px;color:white" class='text-bold'>USER AREA</span></a>
                </li>
                <li class="<?php if(isset($_GET['settings'])) echo "a"?>">
                    <a href="dashboard?settings=settings">
                        <i class="fa fa-user" style="color:white"></i>
                        <span style="color:white">Settings</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                </li> 
                 <li class="<?php if(isset($_GET['help'])) echo "a"?>">
                    <a href="dashboard?help=help">
                        <i class="fa fa-lock" style="color:white"></i>
                        <span style="color:white">Help</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                </li>
                <li class="">
                    <a href="logout">
                        <i class="fa fa-power-off" style="color:white"></i>
                        <span style="color:white">Logout</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                </li>
            </ul>
             <?php endif;?>
        </div>
    </section>
</aside>