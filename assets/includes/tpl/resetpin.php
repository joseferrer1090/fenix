<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/assets/css/login.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="/assets/plugins/iCheck/square/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
         <style>
            .navbar-bvaults{
                /*background-color: #355b82 !important;*/
                background-color: rgba(53, 91, 130, .20) !important;
            }
            .active{
                background-color: rgba(53, 91, 130, 2) !important
            }
            .space-donw-panel{
                margin-top: 200px;
            }
            
        </style>
    </head>
    <body class="hold-transition login-page">
        <nav class="navbar navbar-bvaults navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img class="img-responsive" src="/home/img/nuevo_logo/white.svg" alt="" style="width: 45%; margin-top: -5px;">
                </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="./" style="font-size: 20px; color: white;">Inicio <span class="sr-only">(current)</span></a></li>
                </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="login-box space-donw-panel">
            <div class="login-logo">
                <!--<a href="/login"><b>B-</b>VAULT</a>-->
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Recuperar Pin</p>
                <div id="status"></div>
                <hr>
                <form>
                    <p>
                        Por favor, ingrese su nombre de usuario para recuperar su pin, le enviaremos un correo electrónico para el nuevo pin.
                    </p>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="usuairo" name="uname" id="uname">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="#"  class="btn btn-primary btn-block btn-flat" id="resetpin">Recuperar mi Pin</a>
                            <a href="/login" class="btn btn-primary btn-block btn-flat">Regresar al login</a>
                        </div><!-- /.col -->
                    </div>
                </form>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.4 -->
        <script src="/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="/assets/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="/assets/plugins/iCheck/icheck.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.ui.shake.js"></script>
        <!-- TOKENIZE -->
        <script type="text/javascript" >
            $(function () {
                $.ajaxPrefilter(function (options, origOptions, jqXHR) {
                    options.data = options.data + "&token=" + $("#token").val();
                });
            });
        </script>
        <script type="text/javascript" src="/assets/js/reset.js"></script>
    </body>
</html>
