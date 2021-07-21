<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/ico/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/ico/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/ico/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" href="assets/img/ico/apple-touch-icon-57x57.png">

    <title>Tempat Peninggalan Bersejarah</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet"/>

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet"/>

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/font-awesome-4.1.0/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/css/pe-icons.css')?>" rel="stylesheet"/>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery.js')?>"/></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- <script type="text/javascript">
        $(document).ready(function(){
           'use strict';
        jQuery('#headerwrap').backstretch([
          "../assets/img/bg/background1.jpg",
          "../assets/img/bg/background2.jpg",
          "../assets/img/bg/background3.jpg"
        ], {duration: 3000, fade: 300}); 
    });
    </script> -->

</head>

<body id="page-top" class="index">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-shrink bounceInDown" data-wow-delay="2s" style="background-color:#FFFAF0">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" class="nav-link" href="<?= base_url(); ?>">WEBSITE CV. PADMA</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-link">
                        <a href="<?= base_url(); ?>">Home </a>
                    </li>
                    <li class="dropdown">
                        <a href="<?= base_url('provinsi/'); ?>index">Lokasi</a>
                    </li>                  
                    <li class="dropdown">
                        <?php if (logged_in()) : ?>
                            <a href="<?= base_url('auth/'); ?>logout ">Logout</a>
                        <?php else : ?>
                            <a href="<?= base_url('auth'); ?>">Login</a>
                        <?php endif; ?>
                        </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
                            