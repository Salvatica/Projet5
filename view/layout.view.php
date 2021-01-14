<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="/blog/view/external/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="/blog/view/css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/blog/view/external/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#page-top">logo</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>accueil"> Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>articles"> Articles</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>connexion"> Connexion</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>accueil#contact"> Me contacter</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">

        <?= $content ?>
</div>



<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Adresse</h3>
                    <p>4 rue de la Turquoise
                        <br>44140 Aigrefeuille sur Maine</p>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Liens Sociaux</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                        </li>

                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Mon CV</h3>
                    <p>Lien vers <a href="image/CV.pdf" >mon CV</a> complet.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; Monblog 2020
                </div>
            </div>
        </div>
    </div>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
</footer>
<!-- jQuery -->
<script src="view/external/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="view/external/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="view/js/jqBootstrapValidation.js"></script>
<script src="view/js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="view/js/freelancer.min.js"></script>
</body>
</html>