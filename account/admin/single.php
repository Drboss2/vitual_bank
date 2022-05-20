<div class="udex-main" id="main">
  <hr>
     <h3 class='text-center'><?php echo substr(strtoupper($data->getUserNameById($_GET['single'])),0,8) ?> Account</h3>
  <hr>
    <div class="row">
        <div class="col-md-3 py-1">
            <div class="cardabout_item bg-dark p-3 px-4 rounded">
                <i class="fas fa-dollar-sign text-white-50"></i>
                <div class="card-body">
                    <p class="my-0 text-white text-bold pb-2"><?php echo substr(strtoupper($data->getUserNameById($_GET['single'])),0,8) ?> Account Balance</p>
                    <input type="hidden" id="get" value="<?php echo $_GET['single']?>">
                    <h3 id="balance" class="my-0 text-white font-weight-bold pb-2" style="font-size: 26px">$<?php echo  $data->getBalance('balance',$_GET['single'])?></h3>
                    <a data-toggle="modal" data-target="#exampleModal" style="background:red;color:white" class='btn btn-sm' href="javascript:void(0)">Fund</a> 
                    <a class='btn btn-warning btn-sm edit' data-toggle="modal" data-target="#edit"  edit=<?php echo $_GET['single']?> href="javascript:void(0)">Debit</a>
                   
                </div>
            </div>
        </div>
             <div class="col-md-3 py-1">
            <div class="cardabout_item bg-dark p-3 px-4 rounded">
                <i class="fas fa-dollar-sign text-white-50"></i>
                <div class="card-body">
                    <p class="my-0 text-white text-bold pb-2"><?php echo substr(strtoupper($data->getUserNameById($_GET['single'])),0,8) ?> Investment Balance</p>
                    <input type="hidden" id="get" value="<?php echo $_GET['single']?>">
                    <h3 id="investbalance" class="my-0 text-white font-weight-bold pb-2" style="font-size: 26px">$<?php echo  $data->getBalance('investment_bal',$_GET['single'])?></h3>
                    <a data-toggle="modal" data-target="#index1" style="background:red;color:white" class='btn btn-sm' href="javascript:void(0)">Fund</a> 
                    <a class='btn btn-warning btn-sm edit' data-toggle="modal" data-target="#index2"  edit=<?php echo $_GET['single']?> href="javascript:void(0)">Debit</a>
                   
                </div>
            </div>
        </div>
         <div class="col-md-3 py-1">
            <div class="cardabout_item bg-dark p-3 px-4 rounded">
                <i class="fas fa-dollar-sign text-white-50"></i>
                <div class="card-body">
                    <p class="my-0 text-white text-bold pb-2"><?php echo substr(strtoupper($data->getUserNameById($_GET['single'])),0,8) ?> Deposit Request</p>
                    <input type="hidden" id="get" value="<?php echo $_GET['single']?>">
                    <h3 id="balance" class="my-0 text-white font-weight-bold pb-2" style="font-size: 26px"><?php print_r($data->depoRequest($_GET['single'],'deposit'))?></h3>
                   <a class='btn btn-dark btn-sm edit' data-toggle="modal" data-target="#edit"  edit=<?php echo $_GET['single']?> href="javascript:void(0)">.</a>
                </div>
            </div>
        </div>
          <div class="col-md-3 py-1">
            <div class="cardabout_item bg-dark p-3 px-4 rounded">
                <i class="fas fa-dollar-sign text-white-50"></i>
                <div class="card-body">
                    <p class="my-0 text-white text-bold text-bold pb-2"><?php echo substr(strtoupper($data->getUserNameById($_GET['single'])),0,8) ?> Transfer Request </p>
                    <input type="hidden" id="get" value="<?php echo $_GET['single']?>">
                    <h3 id="balance" class="my-0 text-white font-weight-bold pb-2" style="font-size: 26px"><?php print_r($data-> depoRequest($_GET['single'],'transfer_request'))?></h3>
                     <a class='btn btn-dark btn-sm edit' data-toggle="modal" data-target="#edit"  edit=<?php echo $_GET['single']?> href="javascript:void(0)">.</a>
               
                </div>
            </div>
        </div>
       <div class='col-lg-12'>
    <br>
    <br>
    <br>
        <p style='text-align:center'><?php echo substr(strtoupper($data->getUserNameById($_GET['single'])),0,8);?> History</p>
        <br>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped bg-white text-light">
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>status</th>
                <th>Action</th>
                <th>Date</th>
            </tr>
            <?php if(count($data->UserTransferActivities($_GET['single'])) > 0):?>

                <?php foreach($data->UserTransferActivities($_GET['single']) as $row):?>

                    <tr>
                        <td><?php echo $row->user_id?></td>
                        <td><?php echo $row->data?></td>
                        <td><?php echo $row->status?></td>
                        <td><a class='delete' delete="<?php echo $row->id?>" href="javascript:void(0)">delete</td>

                        <td><?php echo $row->date?></td>
                    
                    </tr>

                <?php endforeach;?>
            <?php endif?>
        </table>
    </div>
    </div>

</div>
<!-- Modal -->
<div  style="z-index:23333333" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
         <p>Credit User Balance</p>
         <p id="error"></p>
         <hr>
        <form id="cre">
            <div class="form-group">
                <label>Amount</label>
                <input type="hidden" id="get" value="<?php echo $_GET['single']?>">

                <input type="text" id="amount" class='form-control' placeholder="enter amount eg 2000" required>
            </div>
            <div class="form-group">
                <input type="submit" id="submit" class='btn btn-info btn-sm' value="submit">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<div  style="z-index:23333333" class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <p>Debit User Balance</p>
                <p id="errors"></p>
                <hr>
                <form id="edit">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="hidden" id="get" value="<?php echo $_GET['single']?>">

                        <input type="text" id="a" class='form-control' placeholder="enter amount eg 2000" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="submit" class='btn btn-info btn-sm' value="submit">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div  style="z-index:23333333" class="modal fade" id="index1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
         <p>Credit Investment Balance</p>
         <p id="errorsinvest"></p>
         <hr>
        <form id="creinvest">
            <div class="form-group">
                <label>Amount</label>
                <input type="hidden" id="get" value="<?php echo $_GET['single']?>">

                <input type="text" id="cre_amount" class='form-control' placeholder="enter amount eg 2000" required>
            </div>
            <div class="form-group">
                <input type="submit" id="submit" class='btn btn-info btn-sm' value="submit">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<div  style="z-index:23333333" class="modal fade" id="index2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <p>Dedit Investment Balance</p>
                <p id="errorsinvest"></p>
                <hr>
                <form id="editinvest">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="hidden" id="get" value="<?php echo $_GET['single']?>">

                        <input type="text" id="aamount" class='form-control' placeholder="enter amount eg 2000" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="submit" class='btn btn-info btn-sm' value="submit">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>