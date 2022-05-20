<!DOCTYPE html>
<html lang="en">
<head>
  <title>admin login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body> 
 
<div class="container">
    <div class='row'>
        <div class="col-lg-6 mx-auto" style="margin-top:100px;padding-top:60px">
       <p>Admin login</p>
        <div class="form-group">
            <form action="../account/modules/login.php" class="banking-login-form" id="LoginForm" method="post">
                <fieldset>
                    <legend class="sr-only">Online banking login form</legend>
                    <label for="username" class="sr-only">Enter your ID to login</label>
                    <div>
                        <input id="username" class="form-control" name="id" type="text" maxlength="25" autocomplete="off" placeholder="ID">
                    </div>
                    <br>
                    <div>
                        <input id="username" class="form-control" name="password" type="password"  autocomplete="off" placeholder="pasword">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-info btn-sm"  name="login" class="login-link">Log In</button>
                </fieldset>
            </form>
        </div>
        </div>
    </div>
</div>
</body>
</html>
