

<div class="row">
    <div class="col-lg-12">
        <ul class="pagination">
            <li class="page-item">
                <a href="javascript:history.back()">Go back</a>
                <a class="btn btn-primary btn-sm" href="#">Admins</a>
            </li>
        </ul>
        <hr>
    </div>
    <div class="col-xl-5 col-md-6 col-12 ">
        <form id="add_admin">
        <p id="add_errors"></p>
            <div class="form-group">
                <label for="">enter admin details</label>
                <input type="text" class="form-control" name="admin" id="admin" placeholder='email' required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info btn-sm">
            </div>
        </form>
    </div>
   
    <div class="col-xl-7 col-md-6 col-12 ">
        <div class="table-responsive">
            <p style='text-align:center'>Admins</p>

            <table class="table table-bordered table-hover table-striped bg-white text-light">
                <tr>
                    <th>LoginId</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
                <?php foreach($data->getAdmin() as $row):?>
                    <tr>
                        <td><?php echo $row->user_id?></td>
                        <td><?php echo $row->email?></td>
                        <td><?php echo $row->password?></td>
                        <td><a class="removes" r="<?php echo $row->id?>" href="#">remove</a></td>
                    </tr>
                <?php endforeach;?>
                <!-- <tr colspan='3'><td><a href="dashboard?users">veiw all</a></td></tr> -->
            </table>
        </div>
    </div>
</div>
