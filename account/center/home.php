<div class="_container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <ul class="pagination">
                <li  class="page-item">
                    <a href="#" class='bg-primary' style="color:white;">Summary</a>
                </li>
            </ul>
            <div class='text-center box'style='padding:16px;'><span class='text-bold'>Your Account Number</span><?php echo isset($_SESSION['account']) ? $_SESSION['account'] : "";?>
            <br><span class='text-bold'>Your Sort Code</span><?php echo isset($_SESSION['sort']) ? $_SESSION['sort'] : "" ;?>
            </div> 
        </div>
        <div class="col-lg-12">
            <?php
                if(isset($_GET['true'])){?>
                    <div class="alert alert-success alert-dismissible text-bold">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> Your transaction has been successfully processed. Thank you for banking with us. 
                    </div>
            <?php  }  ?>
        </div>
        <div class="col-xl-4 col-md-6 col-sm-6 col-12 ">
            <div class="card text-center bg-success">
                <div class="card-header bg-success p-2">Checking Account</div>
                <div class='card-body'>
                    <div class="font-size-20">$<?php echo  isset($_SESSION['id']) ?  number_format($data->getBalance('balance',$_SESSION['id'])) : "" ;?></div>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 col-sm-6 col-12 ">
            <div class="text-center card bg-primary">
               <div class="card-header p-2">Investment Account Bal</div>
                <div class='card-body'>
                    <div class="font-size-20">$<?php echo  isset($_SESSION['id']) ? number_format($data->getBalance('investment_bal',$_SESSION['id'])) :""; ?></div>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 col-sm-6 col-12 ">
            <div class="text-center card bg-default" style="background:grey;color:white">
               <div class="card-header p-2">Total Balance</div>
                <div class='card-body'>
                    <div class="font-size-20">$<?php  echo  isset($_SESSION['id']) ? number_format($data->getBalance('investment_bal',$_SESSION['id']) + $data->getBalance('balance',$_SESSION['id']))  : ""; ?></div>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-6 col-sm-6 col-12  mx-auto">
            <p><a style="color:blue;font-size:14px;" href="">Credit Card Application</a></p>
            <p>To Appy for your personal virtual credit and debit please contact support on live chat or email provided.</p>
            <p><a style="color:blue;font-size:14px;" href="">You can also contact us for e-statement at no cost</a><br>
            To apply for other alliance packages like traveling gifts card,or other online service payments like paypal contact support@affinity.com
            </p>

        </div> 
        <div class="table-responsive">
            <h2 class="page-header text-center text-dark no-border ">Your Activities .</h2>

            <table class='table table-bordered table-striped'>
                <thead>
                    <tr class='bg-pale-dark'>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody id='table'>
                </tbody>
                    <tbody id='clicktable'>
                    
                </tbody>
                <div class="spin col-lg-5 mx-auto">
                </div>    
            </table>
         </div> 
    </div>
           <h2 class="page-header text-center text-dark no-border ">Currency USD/EUR .</h2>

                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container bg-white rounded">
                    <div id="tradingview_d8291" style="height: 400px !important"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                    new TradingView.widget(
                    {
                    "autosize": true,
                    "symbol": "FX_IDC:EURUSD",
                    "interval": "1",
                    "timezone": "Etc/UTC",
                    "theme": "light",
                    "style": "3",
                    "locale": "en",
                    "toolbar_bg": "#f1f3f6",
                    "enable_publishing": false,
                    "hide_top_toolbar": true,
                    "hide_legend": true,
                    "save_image": false,
                    "container_id": "tradingview_d8291"
                    }
                    );
                    </script>
                </div>
                <!-- TradingView Widget END --> 

</div>
