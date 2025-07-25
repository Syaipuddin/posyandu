<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Posyandu </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url().'assets/css/bootstrap.min.css' ?> ">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url().'assets/css/font-awesome.min.css' ?>  ">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href=" <?= base_url().'assets/css/adminpro-custon-icon.css' ?> ">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url().'assets/css/meanmenu.min.css' ?>  ">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url().'assets/css/jquery.mCustomScrollbar.min.css' ?>  ">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url().'assets/css/animate.css' ?>  ">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url().'assets/css/normalize.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/css/Lobibox.min.css' ?>  ">
    <!-- form CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url().'assets/css/form.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/css/notifications.css' ?>  ">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url().'assets/style.css' ?>   ">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url().'assets/css/responsive.css'  ?> ">
    <!-- modernizr JS
		============================================ -->
    <script src="<?= base_url().'assets/js/vendor/modernizr-2.8.3.min.js' ?>  "></script>
</head>

<style>
    #form-login-panitia {
      width: 80%; /* Default full width for mobile */
      margin: 0 auto; /* Center the div */
    }

    @media (min-width: 768px) {
      #form-login-panitia {
        width: 35vw; /* 35% of viewport width on desktop */
        min-width: 400px; /* Optional: prevent becoming too narrow */
        max-width: 600px; /* Optional: prevent becoming too wide */
      }
    }
</style>

<body class="materialdesign">
    <div class="wrapper-pro">
        <div class="login-form-area">
            <div class="container-fluid">
                <div class="row" style="display: flex; flex-direction:column; justify-content:center; align-items:center; height: 98vh;">
                  <h1 style="font-weight: bold;">POSYANDU PAMUJI RAHAYU</h1>
                    <form id="form-login-panitia" class="adminpro-form">
                        <div class="col-12 login-div">
                            <div class="login-bg" style="width: 100%;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="login-title">
                                            <h1>POSYANDU LOGIN</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="login-input-head">
                                            <p>Username</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="login-input-area">
                                            <input type="text" name="username" id="username" placeholder="Masukan Username" />
                                            <i class="fa fa-user login-user" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="login-input-head">
                                            <p>Sandi</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="login-input-area">
                                            <input type="password" name="password" id="password" placeholder="Masukan password" />
                                            <i class="fa fa-lock login-user"></i>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="login-keep-me">
                                                    <label class="checkbox">
                                                        <input type="checkbox" id="show-password" ><i></i>Tampilkan password
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-4">
                                    <div class="login-input-head">
                                      <p>Akses</p>
                                    </div>
                                  </div>
                                  <div class="col-lg-8">
                                    <div class="login-input-area">
                                      <select class="form-control" name="akses">
                                        <option value="">pilih akses</option>
                                        <option value="admin">Administrator</option>
                                        <option value="kader">Kader</option>
                                        <option value="ketua">Ketua</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">

                                    </div>
                                    <div class="col-lg-8">
                                        <div class="login-button-pro">
                                            <button type="submit" class="login-button login-button-lg">Log in</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <!-- login End-->
    </div>
    <script type="text/javascript">
      var BASE_URL = '<?= base_url() ?>';
    </script>
    <!-- jquery
		============================================ -->
    <script src="<?= base_url().'assets/js/vendor/jquery-1.11.3.min.js' ?>  "></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?= base_url().'assets/js/bootstrap.min.js' ?>  "></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?= base_url().'assets/js/jquery.meanmenu.js' ?>  "></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?= base_url().'assets/js/jquery.mCustomScrollbar.concat.min.js'  ?>   "></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?= base_url().'assets/js/jquery.sticky.js' ?>  "></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?= base_url().'assets/js/jquery.scrollUp.min.js' ?> "></script>
    <script src="<?= base_url().'assets/js/Lobibox.js' ?>  "></script>
    <!-- form validate JS
		============================================ -->
    <script src="<?= base_url().'assets/js/jquery.form.min.js' ?> "></script>
    <script src="<?= base_url().'assets/js/jquery.validate.min.js' ?> "></script>
    <!-- main JS
		============================================ -->
    <script src="<?= base_url().'assets/js/main.js' ?> "></script>
    <script src="<?= base_url().'public/mynotif.js' ?>"></script>
    <script src="<?= base_url().'public/auth.js' ?>"></script>
</body>

</html>
