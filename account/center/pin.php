<?php 
if(!isset($_SESSION['otp'])){
    $error =  "<p class='alert alert-danger'>Your Otp has expired.</p>";
}
if(isset($_POST['verify'])) {
    $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $datas = $_SESSION['data'];

    echo $otp = isset($_SESSION['otp']) ? $_SESSION['otp'] : "";
    $name = $datas['name'];
    $sort = $datas['sort'];
    $account = $datas['account'];
    $amount = $datas['amount'];
    $bank = $datas['bank'];
    $country = $datas['country'];

    $city = $datas['city'];
    $ref = $datas['ref'];
    $date = date('y-m-d:h:i:s');

    if(!isset($_SESSION['otp'])){
       $error =  "<p class='alert alert-danger'>Your Otp has expired.</p>";
    }elseif($otp != $post['otp']){
       $error =  "<p class='alert alert-danger'>Otp is invalid</p>";
    }else{
        $data->fundTransfer($amount);
        $data->CreateTransfer($name,$sort,$account,$amount,$bank,$country,$city,$ref,$date);
        unset($_SESSION['otp']);
        header("location:dashboard?true=declined");
    }
}
?>
<div class="_container-fluid">
    <ul class="pagination">
        <li  class="page-item">
            <a href="javascript:history.back()">Go Back</a>
        </li>
        <!-- <li class="page-item"><a href="#">Next</a></li> -->
    </ul>
    <div class="col-lg-7 mx-auto mt-4">
        <form method="post" action="">
            <p>Enter the OTP You receive from your email address to complete your payment.</p>
            <br>
             <?php
                if(isset($error)){
                    echo $error;
                } 
             ?>
            <div class="form-group">
                <label for="">Enter OTP</label>
                <input type="text" class="form-control" name="otp" id="opt" maxlength="6" placeholder="enter otp" required>
                <small id="pin_error" class="form-text text-muted"></small>
            </div>
            <button id='submit' type="submit" name="verify" class="btn btn-info btn-sm btn-block">Verify</button>
        </form>
    </div>
</div>