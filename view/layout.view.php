<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $description ?? "" ?>">
    <meta name="author" content="">

    <title>Blog <?= $title ?? "" ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="/blog/view/external/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="/blog/view/css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/blog/view/external/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">

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
        <a class="navbar-brand p0" href="#page-top">
            <img src="/blog/image/logo1.png" height="100%" alt="logo">
        </a>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
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
                    <?php if (!$this->existInSession('user_name')) { ?>
                        <a class="nav-link" href="<?= URL ?>connexion"> Connexion</a>
                        <?php
                    } else {
                        ?>
                        <a class="nav-link" href="<?= URL ?>logout"> Déconnexion</a>
                        <?php
                    }
                    ?>
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
                    <p>Lien vers <a href="image/CV.pdf">mon CV</a> complet.</p>
                </div>


            </div>
            <!-- Si la session contient la variable 'user_name' => on est connecté
             ET si la variable de session 'user_role' = 'ADMIN' Le lien admin apparait -->
            <?php
            if ($this->existInSession('user_name') && $this->session('user_role') == 'ADMIN') {
                ?>
                <div class="row">
                    <div class="pos-f-t">
                        <div class="collapse" id="navbarToggleExternalContent">
                            <div class="bg-dark p-4">
                                <h4 class="text-white">Administration</h4>
                                <a href="<?= URL ?>admin/listeArticles">Articles</a><br>
                                <a href="<?= URL ?>admin/listeComments">Commentaires</a><br>
                            </div>
                        </div>
                        <nav class="navbar navbar-dark bg-dark">
                            <a data-toggle="collapse" data-target="#navbarToggleExternalContent"
                               aria-controls="navbarToggleExternalContent" aria-expanded="false"
                               aria-label="Toggle navigation">Menu admin</a>
                        </nav>
                    </div>
                </div>
                <?php
            }

            ?>
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
<script src="/blog/view/external/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/blog/view/external/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="/blog/view/js/jqBootstrapValidation.js"></script>
<!-- <script src="/blog/view/js/contact_me.js"></script>-->

<!-- Theme JavaScript -->
<script src="/blog/view/js/freelancer.min.js"></script>
</body>
</html>