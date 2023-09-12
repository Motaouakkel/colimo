<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Optima Board</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->

    <script type="text/javascript" src="functions.js"></script>
   </head>

<body class="external-page sb-l-c sb-r-c">

    <!-- Start: Main -->
    <div id="main" class="animated fadeIn">

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- begin canvas animation bg -->
            <div id="canvas-wrapper">
                <canvas id="demo-canvas"></canvas>
            </div>

            <!-- Begin: Content -->
            <section id="content">

                <div class="admin-form theme-info" id="login1">

                    <div class="row mb15 table-layout">

                        <div class="col-xs-6 va-m pln">
                            <a href="dashboard.html" title="Return to Dashboard">
                               
                            </a>
                        </div>

                        <div class="col-xs-6 text-right va-b pr5">
                            <div class="login-links">
                                <a href="#" class="active" title="Sign In">Authentification</a>
                                
                            </div>

                        </div>

                    </div>

                    <div class="panel panel-info mt10 br-n">

                        <div class="panel-heading heading-border bg-white">
                            <span class="panel-title hidden"><i class="fa fa-sign-in"></i>Se connecter</span>
                           
                        </div>

                        <!-- end .form-header section -->
						
                        <form method="post" id="frmuser" nom="frmuser">
                            <div class="panel-body bg-light p30">
                                <div class="row">
                                    <div class="col-sm-7 pr30">


                                        <div class="section">
                                            <label for="username" class="field-label text-muted fs18 mb10">Utilisateur</label>
                                            <label for="username" class="field prepend-icon">
                                                <input type="text" nom="email_acces" id="email_acces" class="gui-input" placeholder="Entrez votre nom utilisateur">
												
												
                                                <label for="username" class="field-icon"><i class="fa fa-user" style = "margin-top:13px"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section">
                                            <label for="username" class="field-label text-muted fs18 mb10">Mot de passe</label>
                                            <label for="password" class="field prepend-icon">
                                                <input type="password" nom="pass_acces" id="pass_acces" class="gui-input" placeholder="Entrez votre mot de passe">
                                                <label for="password" class="field-icon"><i class="fa fa-lock" style = "margin-top:13px"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                    </div>
                                    <div class="col-sm-5 br-l br-grey pl30">
                                        <h3 class="mb25"> OPTIMA BOARD c'est :</h3>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Accédez à toutes vos données, où que vous soyez</p>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span>La sécurité, par nature et par défaut </p>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Accélérez l'accès à l'information</p>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Une visibilité totale sur vos données</p> <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Allez de l'avant grâce aux données</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end .form-body section -->
                            <div class="panel-footer clearfix p10 ph15">
							
								<a href="#" onclick="accesuser();" class="button btn-primary mr10 pull-right" >se connecter</a>
								
								
								
                                <label class="switch block switch-primary pull-left input-align mt10">
                                    <input type="checkbox" name="remember" id="remember" checked>
                                    <label for="remember" data-on="OUI" data-off="NON"></label>
                                    <span>Se souvenir de moi</span>
                                </label>
								</div>
                        
                            <!-- end .form-footer section -->
                       </form>
                    </div>
                </div>

            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="assets/js/pages/login/EasePack.min.js"></script>
    <script type="text/javascript" src="assets/js/pages/login/rAF.js"></script>
    <script type="text/javascript" src="assets/js/pages/login/TweenLite.min.js"></script>
    <script type="text/javascript" src="assets/js/pages/login/login.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/demo.js"></script>

    <!-- Page Javascript -->
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core      
            Core.init();

            // Init Demo JS
            Demo.init();

            // Init CanvasBG and pass target starting location
            CanvasBG.init({
                Loc: {
                    x: window.innerWidth / 2,
                    y: window.innerHeight / 3.3
                },
            });


        });
		
		

    </script>
	

    <!-- END: PAGE SCRIPTS -->

</body>

</html>
