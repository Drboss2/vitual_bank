<div class="_container-fluid">
    <ul class="pagination">
        <li  class="page-item">
            <a href="../account/dashboard"> Back to Dashboard <span class='fa fa-angle-left pull-left' style='padding-top:2px;'></span></a>
            <a href="#" class='bg-primary' style="color:white;">Withdraw <span class='fa fa-angle-left pull-left' style='padding-top:2px;'></span></a>
        </li>
        <!-- <li class="page-item"><a href="#">Next</a></li> -->
    </ul>
    <div class="row">
        <div class="col-xl-8 col-md-6 col-12 mx-auto ">
          <!-- Nav pills -->
           <div style='padding:20px;width:150px;margin:auto;border-radius:20px;'id='balance'></div>
            
             <!-- <p> plsea</p>
            <a  id='cash' class='btn btn-success' href="">cash</a> <a id='airtime' class='btn btn-info' href="">Airtime</a> -->
            <div class="tab-content">
                <div class="tab-pane container active" id="home">
                    <div class="card p-5" >
                        <div class="card-body">
                            <p id='wres'></p>
                            <form id='withdraw'>
                                <div class="form-group">
                                    <label>Bank</label>
                                    <select name='bank' id='bank' class="form-control">
                                        <option disabled ='selected'>Choose your bank</option>
                                        <option value="Access Bank">Access</option>
                                        <option value="Eco Bank">Eco Bank</option>
                                        <option value="FCMB">FCMB</option>
                                        <option value="FBN">FBN</option>
                                        <option value="GTB">GTB</option>
                                        <option value="Union Bank">Union Bank</option>
                                        <option value="Zenith Bank">Zenith Bank</option>
                                        <option value="Polaris Bank">Polaris Bank</option>
                                        <option value="Unity Bank">Unity Bank"</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Account Name</label>
                                    <input type='text' name='acc_name' id="acc_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type='text' name='amount' id='amount' class="form-control" required>
                                    <span id='a_error'></span>
                                </div>
                                <div class="form-group">
                                    <label>Account Number</label>
                                    <input type='text' name='acc_no' id='acc_no' maxlength="10" class="form-control" required>
                                </div>
                                 <div class="form-group" id='forPins'>
                                    <label for="">4 digits pin</label>
                                    <input type="text" class="form-control" name="pin" id="pin" placeholder="enter 4 digits pins" required>
                                    <span id="pin_error" class="form-text text-muted"></span>
                                </div>
                                <button id='submit' class='btn btn-info'>Withdraw</button>
                                <button style='display:none' id='loading' class='btn btn-info' disabled><span class="spinner-border spinner-border-sm"></span>Loading..</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane container fade" id="menu1">
                    <div class="card p-5 " >
                        <div class="card-body">
                            <p id='ai'></p>
                            <form id='airtime'>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type='text' name='m' id='m' class="form-control" required>
                                    <span id='am_error'></span>
                                </div>
                                <div class="form-group">
                                    <label>Phone no</label>
                                    <input type='text' name='phone' id='phone' class="form-control" required>
                                    <span id='ph_error'></span>
                                </div>
                                <div class="form-group" id='forPins'>
                                    <label for="">4 Digits Pin</label>
                                    <input type="text" class="form-control" name="pin" id="pin" required>
                                    <span id="pin_error1" class="form-text text-muted"></span>
                                </div>
                                <button id='submit' class='btn btn-info'>withdraw</button>
                                <button style='display:none' id='loading' class='btn btn-info' disabled><span class="spinner-border spinner-border-sm"></span>loading..</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>