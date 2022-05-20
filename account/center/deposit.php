<?php
if(isset($_POST['deposit'])){
    $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $amount       = $post['amount'];
    $method       = $post['method'];
    //  $_SESSION['plan']     = $user->plan;
    if($data->deposit($amount,$method)){
       
        $error =  "<p class='alert alert-success'>Your Deposit Request has been successful, You will be contacted shortly</p>";
    }
}
?>

<div class="_container-fluid">
    <ul class="pagination">
        <li  class="page-item">
            <a href="javascript:history.back()">Go Back</a>
            <a class='bg-primary' style="color:white; " href="#">Deposit</a>
        </li>
    </ul>
        <div class="card">
            <div class="card-body">
                <div class="col-lg-7 mx-auto mt-4">

                <h3 class="mb-4 text-center pt-4 pb-4">Fund Your Account</h3>
                <form method="POST" action="">
                <?php
                    if(isset($error)){
                        echo $error;
                    } 
                ?>
                    <div class="input-group mb-3 mt-3">
                        <select id="method" name="method" class='form-control'>
                            <option>Select Payment Method</option>
                            <option>Bitcoin</option>
                            <option>Wire Transfer</option>
                            <option>Bank Transfer</option>
                            <option>Western Union</option>
                        </select>
                    </div>
                    <br>
                    <div class="input-group mb-3 mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">USD</span>
                        </div>
                        <input type="number" id="amount" required name="amount" placeholder="Amount" class="form-control" required />
                    </div>
                    <br>
                    <div class="form-group">
                        <button id="check" name="deposit" class="btn btn-primary">CONTINUE</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
	const check = document.querySelector('#check');

    check.onclick = function(){
        let payment = document.getElementById('method');
        let amount  = document.getElementById('amount');

        if(payment.value == "Select Payment Method"){
           alert("Choose payment method");
           payment.focus();
           return false;
        }
        if(amount.value < 200){
           alert("Minimum amount to deposit is $200");
           amount.focus();
           return false;
        }
    }
</script>



