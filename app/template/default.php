<?php

function echoActiveClassIfRequestMatches($requestUri) {
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri) {
        echo 'class="active"';
    }
}
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>
            <?= $this->title; ?>
        </title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?= URL ?>assets/css/navbar.css">
        <link rel="stylesheet" href="<?= URL ?>assets/css/bootstrap-checkbox.css">
        <link rel="stylesheet" href="<?= URL ?>assets/css/main.css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div id="wrap">
            <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class ="navbar-brand" href="index">Ostoskassi</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <?php if (Session::get('user') != 'employee') : ?>
                                <li <?= echoActiveClassIfRequestMatches("index") ?>><a href="<?= URL ?>index">Tuotteet</a></li>
                            <?php endif ?>
                            <?php if (Session::get('user') == 'passenger') : ?>
                                <li <?= echoActiveClassIfRequestMatches("lennontiedot") ?>><a href="<?= URL ?>lennontiedot">Lennontiedot</a></li>    
                            <?php endif ?>

                            <?php if (Session::get('user') == 'employee') : ?>
                                <li <?= echoActiveClassIfRequestMatches("raportit") ?>><a href="<?= URL ?>raportit">Raportit</a></li>
                                <li <?= echoActiveClassIfRequestMatches("yllapito") ?>><a href="<?= URL ?>yllapito">Tuotteiden ylläpito</a></li>
                            <?php endif ?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if (Session::get('user') != 'employee') : ?>
                                <li <?= echoActiveClassIfRequestMatches("") ?>><a href="<?= URL ?>#">Ostoskori</a></li>
                            <?php endif ?>
                            <?php if (Session::get('loggedIn')) : ?>
                                <li <?= echoActiveClassIfRequestMatches("") ?>><a href="<?= URL ?>logout">Kirjaudu ulos</a></li>   
                            <?php else : ?>
                                <li <?= echoActiveClassIfRequestMatches("") ?>><a href="<?= URL ?>login">Kirjaudu sisään</a></li>      
                            <?php endif ?>
                        </ul>
                    </div> <!-- /.nav-collapse -->
                </div>
            </div>

            <?php require $view; ?>

        </div>

        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <p class="muted credit">&copy; Ostoskassi 2014 </p>
                    </div>
                    <?php if (!Session::get('loggedIn')) : ?>
                        <div class="col-md-3">
                            <p class="muted credit"> <a class="right" href="<?= URL ?>elogin">Työntekijöiden kirjautuminen</a> </p>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="<?= URL ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= URL ?>assets/js/bootstrap-checkbox.min.js"></script>
    </body>
</html>


