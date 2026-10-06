<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="shortcut icon" href="<?= base_url()?>/assets/admin/images/favicon.png" type="image/png">-->

    <title>Admin PJU Bna</title>

    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/fontawesome/css/font-awesome.css">

    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/css/quirk.css">

    <script src="<?= base_url()?>/assets/admin/lib/modernizr/modernizr.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?= base_url()?>/assets/admin/lib/html5shiv/html5shiv.js"></script>
    <script src="<?= base_url()?>/assets/admin/lib/respond/respond.src.js"></script>
    <![endif]-->
</head>

<body class="signwrapper">

<div class="sign-overlay"></div>
<div class="signpanel"></div>

<div class="panel signin">
    <div class="panel-heading">
        <h1>Admin Dinhub BNA</h1>
        <h4 class="panel-title">Selamat Datang! Silakan Login</h4>
    </div>
    <div class="panel-body">
<!--        <div class="or">or</div>-->
        <?php
        if (!empty($_SESSION['error'])){
        ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error']?>
        </div>
        <?php } ?>
        <form action="<?= base_url('admin/auth/login')?>" method="POST">
            <div class="form-group mb10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Enter Username">
                </div>
            </div>
            <div class="form-group nomargin">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                </div>
            </div>
            <div><a href="#" class="forgot">Lupa password?</a></div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-quirk btn-block">Sign In</button>
            </div>
        </form>
        <hr class="invisible">
        <div class="form-group">
            <a href="signup.html" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">Bukan Tim? Daftar Dulu!</a>
        </div>
    </div>
</div><!-- panel -->

</body>
</html>
