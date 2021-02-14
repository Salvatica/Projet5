<?php ob_start(); ?>

    <!-- Header -->
    <header>
        <div class="pseudohead">
        <div class="container">
        <div class="jumbotron jumbotron-fluid change mb-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">Florence Grisot</span>
                        <hr class="star-light">
                        <span class="skills">De la compta au web</span>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </header>

    <!-- About Me -->
    <section class="success" id="About">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <h2>Qui suis-je ?</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Passionnée par l'informatique depuis longtemps, j'ai décidé de suivre une formation de Développeur d'application PHP Symfony auprès d'OpenClassrooms</p>
                </div>
                <div class="col-lg-4">
                    <p>Actuellement contrôleur en cabinet d'Expertise Comptable, je me destine à faire de l'informatique mon futur métier !</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <?php if(!empty($success)):?>
            <div class="alert alert-success"><p><?=$success;?></p></div>
        <?php endif;?>

        <?php if(!empty($errors)):?>
        <div class="alert alert-danger">
            <?php foreach($errors as $error):?>
                <p><?=$error;?></p>
            <?php endforeach;?>
        </div>
        <?php endif; ?>
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <h2>Me Contacter</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" method="POST" action="<?= URL ?>sendEmail" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nom</label>
                                <label for="name"></label><input name="name" type="text" class="form-control" placeholder="Nom" id="name" required data-validation-required-message="Entrez votre nom.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>adresse mail</label>
                                <label for="email"></label><input name="email" type="email" class="form-control" placeholder="Adresse mail" id="email" required data-validation-required-message="Entrez votre email.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Téléphone</label>
                                <label for="phone"></label><input name="phone" type="tel" class="form-control" placeholder="Téléphone" id="phone" required data-validation-required-message="Entrez votre numéro de téléphone.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <label for="message"></label><textarea name="message" rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Saisissez votre message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>




<?php
$content = ob_get_clean();
$titre="blog";
require "layout.view.php";
?>

