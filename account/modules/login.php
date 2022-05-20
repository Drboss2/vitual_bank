<?php
 include('../config/db.php');
 include('../modules/script.php');

 $db = new Database();

 $con = $db->connect();

 $user = new User($con);


if(isset($_POST['login'])){
    $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $id =  $post['id'];
    $user->password =  $post['password'];
    // $email  = $_POST['email'];

    if(empty($id || $user->password)){
        $error = " <p class='text-danger'>ID or password is required</p>";
    }elseif($user->login($id) === "not"){
        $error = "<p class='text-danger'>No user found</p>";
    }elseif($user->login($id) == 'user'){
        header("location:../dashboard?account");
    }elseif($user->login($id) =='admin'){
       header('location:../dashboard?admin');
    }else{
        $error = "<p class='text-danger'>Invalid password</p>";
    }

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
         <div class="container">
            <div class="col-lg-9 mx-auto">
                <div class="cards p-3">
                    <div class="card-body border">
                        <h3 class='text-center pb-3 pt-3'>Welcome to Affinity Overseas Trust Bank Online Banking</h3>
                        <?php 
                           if(isset($error)){
                                echo $error;
                             }
                        ?>
                        <p>Thank you for choosing Affinity Overseas Trust Bank</p>
                        <br>
                        <p><a href="javascript:history.back()">Go Back</a> &nbsp;&nbsp;<a href='https://affinityotb.com//'>Home</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

?>