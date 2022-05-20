<div class="_container">
    <ul class="pagination">
        <li  class="page-item">
            <a href="../account/dashboard">Back to Dashboard <span class='fa fa-angle-left pull-left' style='padding-top:2px;'></span></a>
             <a href="#" class='bg-primary' style="color:white;">Redeem G-Token <span class='fa fa-angle-left pull-left' style='padding-top:2px;'></span></a>
        </li>
    </ul>
    <div class="col-lg-6 mx-auto mt-4">
        <p id='r'></p>
            <form class="redeemNow">
                <p class='alert alert-warning'></b>Note:</b>  Each G-token Redeemed qualitfy you for a raffle Draw.</p>

                <div class="form-group">
                    <label for="">G-Token</label>
                    <input type="text" class="form-control" name="token" id="token" placeholder="Enter Giver-Token Here" required>
                    <small id="cat_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group" id='forPins'>
                    <label for="">4 Digits Pin</label>
                    <input type="text" class="form-control" name="pin" id="pin" placeholder="Enter 4 Digits Pins" required>
                    <small id="pin_error" class="form-text text-muted"></small>
                </div>
                    <button style='display:none' id='loading' class='btn btn-info btn-sm' disabled><span class="spinner-border spinner-border-sm"></span> Loading..</button>
                    <button id='submit' type="submit" class="btn btn-info btn-sm">Redeem Now</button>
            </form>
    </div>
</div>