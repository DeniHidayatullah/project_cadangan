<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SMK NEGERI 7 JEMBER </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/plugins/animate/animate.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/animate.css-master/animate.min.css">
  <!--===============================================================================================-->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/login/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/plugins/iCheck/square/blue.css">

  <style>
    body {
      background: url(<?php echo base_url(); ?>asset/img/foto.jpg);
      margin: 0;
      background-size: 100% 100%;
      background-attachment: fixed;
      min-height: 100%;
    }
  </style>
</head>

<body>
  <div class="animated bounceInDown">
    <div class="login-box">
      <div class="login-logo"><b>
          <img src="<?php echo base_url(); ?>asset/img/logo-.png"></b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">
          <b>SISTEM INFORMASI</b> AKADEMIK SMK NEGERI 7 JEMBER</a>

          <form action="<?php echo base_url(); ?>login/cek" method="post">
            <div class="form-group has-feedback">
              <input type="text" class="form-control" name='username' placeholder="Username" required>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" name='password' placeholder="Password" required>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <button name='submit' type="submit" class="btn btn-warning btn-lg btn-block">Login</button>
              </div><!-- /.col -->
            </div>
      </div>
      </form>

    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->
</body>

</html>