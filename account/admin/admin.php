<div class="row">
    <div class="col-lg-12">
        <ul class="pagination">
            <li class="page-item">
                <a href="javascript:history.back()">Go back</a>
                <a class="btn btn-primary btn-sm" href="#">Admin</a>
            </li>
        </ul>
        <hr>
    </div>
    <div class="col-xl-3 col-md-6 col-12 ">
        <div class="box box-body  border text-center">
            <div class="font-size-20 font-weight-20"><?php echo count($data->getAll('users')) ?></div>
            <div>All Users</div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12 ">
        <div class="box box-body border text-center bg-primary">
            <div class="font-size-20 font-weight-20"><?php echo count($data->getAll('deposit')) ?></div>
            <div>Deposit Request</div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12 ">
        <div class="box box-body border text-center bg-primary">
            <div class="font-size-20 font-weight-20"><?php echo  count($data->countAdmin()) ?></div>
            <div>Admins</div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12 ">
        <div class="box box-body border text-center">
            <div class="font-size-20 font-weight-20">
            <?php echo count($data->getAll('transfer_request')) ?>
            </div>
            <div>Transfer Request</div>
        </div>
    </div>
    
    <div class='col-lg-12'>
    <br>
    <br>
    <br>
        <p style='text-align:center'>User History</p>
        <br>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped bg-white text-light">
            <tr>
                <th>LoginId</th>
                <th>Email</th>
                <th>Country</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Sex</th>
                <th>Acc Type</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
            <?php if(count($data->getAllUsers()) > 0):?>

                <?php foreach($data->getAllUsers() as $row):?>

                    <tr>
                        <td><?php echo $row->user_id?></td>
                        <td><?php echo $row->email?></td>
                        <td><?php echo $row->country?></td>
                        <td><?php echo $row->phone?></td>

                        <td><?php echo $row->address?></td>

                        <td><?php echo $row->sex?></td>
                        <td><?php echo $row->acc_type?></td>
                        <td><?php echo $row->status?></td>
                        <td><?php echo $row->date?></td>
                    
                    </tr>

                <?php endforeach;?>
            <?php endif?>
            <tr colspan='3'><td><a href="dashboard?users">veiw all</a></td></tr>
        </table>
    </div>
</div>