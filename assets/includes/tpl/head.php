<?php
global $hooks;
global $menu_array;
$product=get_data($_SESSION['uid'],'product');
$role=get_data($_SESSION['uid'],'role');
$fecha_vencimiento=getFechaExpiracion($product);

?>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
        <meta name="description" content="">
        <meta name="author" content="ThemeBucket">
        <link rel="shortcut icon" href="#" type="image/png">
        <title><?php $hooks->do_action("the_title"); ?> - Fenix | Premium</title>

        <!--icheck-->
        <link href="/assets/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
        <link href="/assets/js/iCheck/skins/square/square.css" rel="stylesheet">
        <link href="/assets/js/iCheck/skins/square/red.css" rel="stylesheet">
        <link href="/assets/js/iCheck/skins/square/blue.css" rel="stylesheet">

        <!--dashboard calendar-->
        <link href="/assets/css/clndr.css" rel="stylesheet">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="/assets/js/morris-chart/morris.css">

        <!--common-->
        <link href="/assets/css/style.css" rel="stylesheet">
        <link href="/assets/css/style-responsive.css" rel="stylesheet">
        <link href="/assets/css/responsivetabel.css" rel="stylesheet">

<?php $hooks->do_action("global_css"); ?>

<style>
     ul.nav-stacked li:nth-child(4){
        display: none;
 }
     ul.nav-stacked li.menu-list:nth-child(3){
        display: block;
 }
     ul.nav-stacked li.menu-list:nth-child(4){
        display: block;
 }
 
  li.menu-list:nth-child(4) li:nth-child(4) {
        display: block;
 }
    
  ul.nav-stacked li:nth-child(9){
        display: none;
 }
 
    ul.nav-stacked li:nth-last-child(7){
 }
  ul.nav-stacked li:nth-child(10){
        display: none;
 }
  ul.nav-stacked li:nth-child(11){
        display: none;
 }
  li.menu-list:nth-child(3) li:nth-child(2) {
        display: block;
 }
  li.menu-list:nth-child(3) li:nth-child(3) {
        display: none;
 }
  li.menu-list:nth-child(2) li:nth-child(4) {
        display: block;
 }
   li.menu-list:nth-child(2) li:nth-child(5) {
        display: none;
 }
   ul.nav-stacked li:nth-child(12) li:nth-child(4){
    display: block;
   }
    ul.nav-stacked li:nth-child(12) li:nth-child(3){
    display: block;
   }

</style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="sticky-header">

        <section>
            <!-- left side start-->
            <div class="left-side sticky-left-side">

                <!--logo and iconic logo start-->
                <div class="logo text-center">
                    <?php if($role=1):?>
                        <img src='/assets/images/product/<?php echo $product ?>.png' alt=''  style="height: 170px;margin-top: 15px;"/> 
                        <?php endif;?>
                </div>
                <!--logo and iconic logo end-->

                <div class="left-side-inner">

                    <!--sidebar nav start-->
<?php menu_render($menu_array); ?>
                    <!--sidebar nav end-->

                </div>
            </div>
            <div class="main-content" >
                <div class="header-section row" style="margin-left: 0px;">

                    <a class="toggle-btn col-sm-1"><i class="fa fa-bars"></i></a>
                    <strog class="col-sm-6" style="    line-height: 50px;">
                     

                     <b>Usuario</b> &nbsp; &nbsp;<?php echo strtoupper($_SESSION["uname"]); ?> 
                       
</strog>
                    <div class="menu-right">

                        <ul class="notification-menu">
                            <li>
<?php if (isset($_SESSION["godmode"]["status"])) { ?>
                                    <a href="/godmode-off" class="btn btn-default dropdown-toggle hidden-xs">
                                        <i class="fa fa-lock"></i>      Back 
                                    </a>

                                      <a href="/godmode-off" class="btn btn-default dropdown-toggle visible-xs">
                                        <i class="fa fa-lock "></i>       
                                    </a
<?php } else { ?>
                                    <a href="/logout" class="btn btn-default dropdown-toggle hidden-xs">
                                        <i class="fa fa-sign-out"></i>  Cerrar Sesion
                                    </a>

                                      <a href="/godmode-off" class="btn btn-default dropdown-toggle visible-xs">
                                        <i class="fa fa-sign-out"></i>       
                                    </a>
<?php } ?>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="page-heading">
                    <h3>
<?php $hooks->do_action("the_title"); ?>
                    </h3>
                    <div class="state-info">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="summary">
                                   <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

     <script type="text/javascript" >
$(document).ready(function() {
  function perro(){
 
   $.ajax({
            url: 'http://api.coindesk.com/v1/bpi/currentprice.json',
            type:'GET',
            dataType: 'JSON',
            success: function (data) {
            var numero = data.bpi.USD.rate;
            var numero2 = '<?php echo ($_SESSION["role"] == "1" ? "" . current_fund() : ""); ?>';
            var resultado= parseInt(parseInt(numero2) * parseInt(1)) / parseInt(numero);
            $(".porcent").html("BTX"+"="+"<span id='usdavailable'>"+resultado.toFixed(2)+'</span>');
        }
       })
   }
    setTimeout(perro(),3000);
});
</script>                          
                      

                                    <span>Fondos Disponibles</span>
                                    <h3 class="txt" style="color:rgba(31, 115, 191,1)"><?php echo ($_SESSION["role"] == "1" ? "$<span style='font-size:20px;color:rgba(31, 115, 191,1);line-height:20px;font-weight:bold' id='realavailable'>" . number_format((float) current_fund() , 2, '.', '') : "UNLIMITED"); ?></span></h3>
                                    <span class="porcent"></span>
                                </div>
                            </div>
                        </section>
                        <section class="panel">
                            <div class="panel-body">
                                <div class="summary">
                                    <span>Fondos de Ganacias</span>
                                    <h3 class=""><?php echo ($_SESSION["role"] == "1" ? "$" .   number_format((float)current_utilities() , 2, '.', '' )  : "UNLIMITED"); ?></h3>
                                </div>
                                
                            </div>
                        </section>

                        <section class="panel">
                            <div class="panel-body">
                                <div class="summary">
                                    <span>Bonificacion</span>
                                    <h3 class="red-txt"><?php echo ($_SESSION["role"] == "1" ? "$" . number_format((float)current_register_fund()  , 2, '.', '') : "UNLIMITED"); ?></h3>
                                </div>
                            </div>
                        </section>
                      
                    </div>
                </div>
                <div class="wrapper">