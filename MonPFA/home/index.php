<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">

    <style>

    </style>

    ​


    <title>Home</title>

</head>

<body>
    <?php require "include/nav.php"; ?>




    <!--==========================
    Top Bar
  ============================-->
    <section id="topbar" class="d-none d-lg-block">
        <div class="container clearfix">


        </div>
    </section>

    <!--==========================
    Header
  ============================-->
    <!-- <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#body" class="scrollto">Reve<span>al</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
    </div>

    <!-- <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#body">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    <!-- </div> -->
    <!-- </header>#header  -->

    <!--==========================
    Intro Section
  ============================-->
    <section id="intro">

        <div class="intro-content">
            <!-- <h2>GESTION <span>DES PROJETS</span><br>DE FIN D'ANNEE</h2> -->
            <h2 class="animate__animated animate__bounce">GESTION <span>DES PROJETS</span><br>DE FIN D'ANNEE</h2>
            <div>
                <a href="login.php" class="btn-get-started scrollto">Login</a>

            </div>
        </div>

        <div id="intro-carousel" class="owl-carousel">
            <div class="item" style="background-image: url('img/1.png');"></div>

        </div>

    </section><!-- #intro -->

    <main id="main">

        <!--==========================
      About Section
    ============================-->
        <section id="about" class="wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 about-img">
                        <img src="img/about-img.jpg" alt="">
                    </div>

                    <div class="col-lg-6 content">
                        <h2>DESCRIPTION DU PROJET</h2>
                        <h3>Offrant des capacités performantes, l’application « Gestion des projets de fin d’année »
                            facilitera le binomage, la proposition et l’affectation des projets ainsi que d’encadrement
                            par le professeur à travers des pages web avec des options spécifique pour chaque
                            intervenant.</h3>

                        <ul>
                            <li><i class="ion-android-checkmark-circle"></i> APPORTS :</li>
                            <li> — Faciliter et personnaliser le choix des binômes en permettant l’accès aux contenus
                                des étudiants de la même filière ;</li>
                            <li> — Faciliter l’affectation des sujets par les encadrants ;</li>
                            <li> — Développer l’échange et le travail collaboratif ;</li>
                            <li>— Renforcer les méthodes d’évaluation et assurer un suivi permanent et personnalisé</li>


                        </ul>

                    </div>
                </div>

            </div>
        </section><!-- #about -->

        <!--==========================
      Services Section
    ============================-->
        <section id="services">
            <div class="container">
                <div class="section-header">
                    <h2>Services</h2>
                    <p>LE SITE WEB OFFRE PLUSIEURS SERVICES DE GESTION DES PROJETS</p>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="box wow fadeInLeft">
                            <div class="icon"><i class="fa fa-bar-chart"></i></div>
                            <h4 class="title"><a href="">ETUDIANT</a></h4>
                            <p class="description">l'application facilite le binomage entre les eleves, la proposition
                                et l’affectation des projets, et la coordination avec le professeur</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInRight">
                            <div class="icon"><i class="fa fa-picture-o"></i></div>
                            <h4 class="title"><a href="">PROFESSEUR</a></h4>
                            <p class="description">L'application permet aux encadrants de proposer les sujet, et lui
                                facilite l'encadrement des eleves.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInLeft" data-wow-delay="0.2s">
                            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                            <h4 class="title"><a href="">ADMINISTRATION</a></h4>
                            <p class="description">L'administrateur gere d'une maniere fluide l'application.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInRight" data-wow-delay="0.2s">
                            <div class="icon"><i class="fa fa-map"></i></div>
                            <h4 class="title"><a href="">PROJETS</a></h4>
                            <p class="description">Produire des projets bien finalisé, pour exploitation</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- #services -->

        <!--==========================
      Clients Section
    ============================-->
        <!-- <section id="clients" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Clients</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div> -->

        <div class="owl-carousel clients-carousel">
            <img src="img/clients/client-1.png" alt="">
            <img src="img/clients/client-2.png" alt="">
            <img src="img/clients/client-3.png" alt="">
            <img src="img/clients/client-4.png" alt="">
            <img src="img/clients/client-5.png" alt="">
            <img src="img/clients/client-6.png" alt="">
            <img src="img/clients/client-7.png" alt="">
            <img src="img/clients/client-8.png" alt="">
        </div>

        </div>
        </section><!-- #clients -->

        <!--==========================
      Our Portfolio Section
    ============================-->


</body>

</html>