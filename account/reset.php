<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Reset password</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">

  <!-----icon --->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
<!-- ======= Header ======= -->
    <?php require '../head/header.php'?>
<br>
<br>
<br>
<br>
    <div class="col-lg-4 mx-auto">
        <div class="card mb-5" style='padding:25px;'>
            <p class='text-center' style='font-size:14px;'>Enter your email to reset your password.</p>
            <p id="resetp"></p>
            <form id='resetpass'>
                <div class="form-group">
                    <label for="phone" style='font-size:14px;'>Enter email</label>
                    <input type="text" class="form-control" id="email" placeholder="enter email" required >
                    <small id='e_error' class='text-danger'></small>
                </div>
                 <button id='submit' type="submit" class="btn btn-primary btn-block btn-sm">send</button>
                 <button style='display:none;' id='loading' type="submit" class="btn btn-primary btn-block btn-sm" disabled>  <span class="spinner-border spinner-border-sm"></span> loading...</button>
                 <p style='font-size:13px;text-align:center' class='mt-2'>A verification link will be sent to the email provided</p>
            </form>
        </div>
    </div>
    <?php require '../head/footer.php'?>
    <script src='assets/js/login.js'></script>
</body>
</html>