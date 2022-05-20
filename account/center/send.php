<?php
if(isset($_POST['Create'])) {
    $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);

    $arry = array(
        'name' => $post['name'],
        'sort' => $post['sort'],
        'account' => $post['account'],
        'amount' => $post['amount'],
        'bank' => $post['bank'],
        'country' => $post['country'],
        'city' => $post['city'],
        'ref' => $post['ref'],
    );

    if($arry['amount'] > $data->getBalance('balance',$_SESSION['id'])){
        $error =  "<p class='alert alert-danger'>Invalid amount</p>";
    }else{
        $_SESSION['data'] = $arry;

        $data->sendOTP($_SESSION['email']);

        header('location:dashboard?pin=pin');
    }
}

?>
<div class="_container-fluid">
    <ul class="pagination">
        <li  class="page-item">
            <a href="javascript:history.back()">Go Back <span class='fa fa-angle-left pull-left' style='padding-top:2px;'></span></a>
            <a class='bg-primary' style="color:white; " href="#">Funds</a>
        </li>
    </ul>
    <div class="card">
        <div class="card-body">
            <br>
            <br>          
            <div class="font-size-20 text-center mb-3">$<?php echo isset($_SESSION['id']) ? number_format($data->getBalance('balance',$_SESSION['id'])):"";?>
             <br><span style="font-size:12px;">Spending account</span></div>
             <br>
             <?php
                if(isset($error)){
                    echo $error;
                } 
             ?>
            <form class="" method="post" action="">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Sort Code/Swift Code</label>
                        <input type="text" class="form-control" name="sort" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Account no</label>
                        <input type="text" class="form-control" name="account" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Amount</label>
                        <input type="text" class="form-control" name="amount" required placeholder="eg 2000">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Bank Name</label>
                        <input type="text" class="form-control" name="bank" required>
                    </div>
                     <div class="form-group col-lg-6">
                        <label for="">Country</label>
                        <input type="text" class="form-control" name="country" required>
                    </div>
                     <div class="form-group col-lg-6">
                        <label for="">City/Sate/Region</label>
                        <input type="text" class="form-control" name="city" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Reference Phase(if any)</label>
                        <input type="text" class="form-control" name="ref" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="submit" class="btn btn-primary btn-sm" name="Create" value="continue">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
::placeholder {
  font-size: 12px;
}

</style>