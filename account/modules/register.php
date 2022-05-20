<?php
include('../config/db.php');
include('../modules/script.php');

 $db = new Database();

 $con = $db->connect();

 $user = new User($con);

if(isset($_POST['Create'])){
    $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $user->password   = $post['password'];
    $user->email      = $post['email'];
    $user->first_name = $post['first_name'];
    $user->sex        = $post['sex'];
    $user->address    = $post['address'];
    $user->acc_type   = $post['acc_type'];
    $user->acc_mode   = $post['acc_mode'];

    $user->country    = $post['country'];
    $user->phone      = $post['phone'];

    if($user->emailExist($user->email)){
        $error ="<p class='alert alert-danger'>email address has already been used.</p>";
    }else{
        if($user->CreateAccount()){
            $error ="<p class='alert alert-success'>Account Creation successfull <br> Your Login Details has been sent to your registered Email.</p>";
        }
    }
}else{
    echo 'not set';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Banking Registeration</title>
    <link rel='stylesheet' href="../lib/boostcss/bootstrap.min.css">
</head>
<body>
    <style>
        .cards{
            font-family: "Sofia Pro" !important;
            transition:  transform 0.2s ease-in-out;
            /* padding:20px; */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .cards form{
            width:100%;
        }
        .cards form h1 p{
            text-align: center;
            color:rgba(0, 0, 0, 0.87);
        }
        .cards form input{
            padding:9px 15px;
            width:  100%;
            border: 1px solid #ced4da;
        }

        .cards input:focus{
            outline: none !important;
        }
        .cards input::placeholder{
            font-size: 14px;
        }
    </style>
    <div class="container">
        <div class="cards">
            <div class="card-body border">
                <h3 class='text-center pb-3 pt-3'>Welcome to Online Banking</h3>
                <?php 
                    if(isset($error)){
                        echo $error;
                        }
                ?>
                <p>Thank you for choosing Affinity Online Banking</p>
                <br>
                <p><a href="javascript:history.back()">Go Back</a> &nbsp;&nbsp;<a href="../../login/index.htm">Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>
