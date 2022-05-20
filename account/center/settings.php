<?php
if(isset($_POST['update'])) {
    $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);

    $pass = $post['password'];
    if(!empty($pass)){
        $error =  "<p class='alert alert-danger'>Invalid amount</p>";
    }else{
        $data->changepassword($pass);
        $error =  "<p class='alert alert-success'>User profile updated</p>";
    }
}

?>

<div class="_container-fluid">
    <ul class="pagination">
        <li  class="page-item">
            <a href="javascript:history.back()">Go Back</a>
            <a class='bg-primary' style="color:white; " href="#">settings</a>
        </li>
    </ul>
    <div class="card">
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
                <p class='text-center'>Your Details</p>
                   <?php
                        if(isset($error)){
                            echo $error;
                        } 
                    ?>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" required value="<?php echo $_SESSION['email']?>"readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="first_name" required  value="<?php echo $_SESSION['first_name']?>"readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">Country</label>
                        <input type="text" class="form-control" name="country" required  value="<?php echo $_SESSION['country']?>"readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">City</label>
                        <input type="text" class="form-control" name="city" required value="<?php echo $_SESSION['city']?>" readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="">New Password</label>
                        <input type="text" class="form-control" name="password" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="submit" class="btn btn-primary btn-sm" name="update">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>