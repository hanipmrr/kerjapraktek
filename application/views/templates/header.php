<?php
/**
 * <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?= base_url()?>assets/img/ico/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url()?>assets/img/ico/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url()?>assets/img/ico/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url()?>assets/img/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" href="<?= base_url()?>assets/img/ico/apple-touch-icon-57x57.png">

    <title><?= $judul; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/animate.css" rel="stylesheet">

    <link href="<?= base_url()?>assets/css/tailwind.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url()?>assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url()?>assets/css/pe-icons.css" rel="stylesheet">

    
    <!-- jQuery -->
    <script src="<?= base_url()?>assets/js/jquery.js"></script>
    
    <!-- SELECT 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
        $(document).ready(function(){
           'use strict';
        jQuery('#headerwrap').backstretch([
          "<?= base_url()?>assets/img/bg/background1.jpg",
          "<?= base_url()?>assets/img/bg/background2.jpg",
          "<?= base_url()?>assets/img/bg/background3.jpg"
        ], {duration: 8000, fade: 500});

        $("#mapwrapper").gMap({ controls: false,
            scrollwheel: false,
            markers: [{     
                latitude:40.7566,
                longitude: -73.9863,
            icon: { image: "<?= base_url()?>assets/img/marker.png",
                iconsize: [44,44],
                iconanchor: [12,46],
                infowindowanchor: [12, 0] } }],
            icon: { 
                image: "<?= base_url()?>assets/img/marker.png", 
                iconsize: [26, 46],
                iconanchor: [12, 46],
                infowindowanchor: [12, 0] },
            latitude:40.7566,
            longitude: -73.9863,
            zoom: 14 });

        $('a[href="#search"]').on('click', function(event) {
            event.preventDefault();
            $('#search-wrapper').addClass('open');
            // $('#search-wrapper > form > input[type="search"]').focus();
        });
        
        $('#search-wrapper, #search-wrapper button.close').on('click keyup', function(event) {
            if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
                $(this).removeClass('open');
            }
        });

        // $('#select2_provinsi').select2({
            
        // });
        
        // $('form').submit(function(event) {
        //     event.preventDefault();
        //     return false;
        // })

        $.ajax({
            url: '<?= base_url('/fetchProvinsi') ?>',
            type: 'GET',
            dataType: "json",
            success: function(data){
                // var option
                $("#select2_provinsi").append('<option>Pilih Provinsi</option>')
                $.map(data, function(data) {
                    $("#select2_provinsi").append(`<option value="${data.id_provinsi}">${data.nama_provinsi}</option>`)
                })
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.group('ERROR FETCH DATA!')
                console.error('jqXHR : '+jqXHR)
                console.error('status: '+textStatus)
                console.error('error : '+errorThrown)
                console.groupEnd()
            }
        })

        // $("#select2_provinsi").change(function() { 
        //     $(#search_id_provinsi).val(this.value)
        // })
    });
    </script>

</head>

<body id="page-top" class="index" style="min-height: 100vh;
                                        display: grid;
                                        grid-template-rows: auto 1fr auto;
                                        grid-template-columns: 100%;">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-shrink bounceInDown" data-wow-delay="2s">
        <div class="container" style="background-color:black">
        
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <a class="navbar-brand" style="color:white" class="nav-link" href="<?= base_url(); ?>">Website CV. PADMA</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" >
                    <li class="nav-link">
                        <a style="color:white" href="<?= base_url(); ?>">Home </a>
                    </li>

                    <li class="nav-link">
                        <a style="color:white" href="<?= base_url('provinsi/'); ?>index">Daerah</a>
                    </li>

                    <li  class="nav-link" style="background:rgb(153, 220, 123);border-radius:8px;">
                        <?php if (isset($_SESSION['username'])) : ?>
                            <a style="color:white" href="<?= base_url('auth/'); ?>logout ">Logout</a>
                        <?php else : ?>
                            <a style="color:white" href="<?= base_url('auth'); ?>">Login</a>
                        <?php endif; ?>
                    </li>
                    <li><a href="#search"><i class="pe-7s-search" style="color:white"></i></a></li>
                               
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <div id="search-wrapper" style="display: flex; background-color: black; height: 100vh">
            <button type="button" class="close">X</button>

            <!-- Nama Objek Tangibel -->
            <form method="POST" action="<?= base_url('objek/cariObjek')?>" style="display: flex; margin: auto;">
                <!-- <input id="search_id_provinsi" name="id_provinsi" type="hidden"/> -->
                <select id="select2_provinsi" 
                    type="text" 
                    class="form-control" 
                    name="jenis_post_tangible" 
                    required
                    style="margin-right:2rem;"></select>

                <input name="query" type="text" class="form-control" value="" placeholder="Cari Sesuatu..." />

                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
    </div>

    <main style="height: 100%;">
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?= base_url()?>assets/img/ico/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url()?>assets/img/ico/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url()?>assets/img/ico/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url()?>assets/img/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" href="<?= base_url()?>assets/img/ico/apple-touch-icon-57x57.png">

    <title><?= $judul; ?></title>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="<?= base_url()?>assets/css/animate.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet">

    <link href="<?= base_url()?>assets/css/tailwind.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url()?>assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url()?>assets/css/pe-icons.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="<?= base_url()?>assets/js/jquery.js"></script>
    
    <!-- SELECT 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function(){
           'use strict';
        jQuery('#headerwrap').backstretch([
          "<?= base_url()?>assets/img/bg/background1.jpg",
          "<?= base_url()?>assets/img/bg/background2.jpg",
          "<?= base_url()?>assets/img/bg/background3.jpg"
        ], {duration: 8000, fade: 500});

        $("#mapwrapper").gMap({ controls: false,
            scrollwheel: false,
            markers: [{     
                latitude:40.7566,
                longitude: -73.9863,
            icon: { image: "<?= base_url()?>assets/img/marker.png",
                iconsize: [44,44],
                iconanchor: [12,46],
                infowindowanchor: [12, 0] } }],
            icon: { 
                image: "<?= base_url()?>assets/img/marker.png", 
                iconsize: [26, 46],
                iconanchor: [12, 46],
                infowindowanchor: [12, 0] },
            latitude:40.7566,
            longitude: -73.9863,
            zoom: 14 });

        $('#search-navbar').on('click', function(event) {
            event.preventDefault();
            $('#search-wrapper').addClass('open');
        });
        
        $(document).on('keyup', function(e) {
            if (e.key == "Escape") $('#closeSearch').click();
        });

        $('#closeSearch').on('click', function(event) {
            if(event.target === this) {
                $('#search-wrapper').removeClass('open');
            }
        
        });

        $.ajax({
            url: '<?= base_url('/fetchProvinsi') ?>',
            type: 'GET',
            dataType: "json",
            success: function(data){
                // var option
                $("#select2_provinsi").append('<option>Pilih Provinsi</option>')
                $.map(data, function(data) {
                    $("#select2_provinsi").append(`<option value="${data.id_provinsi}">${data.nama_provinsi}</option>`)
                })
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.group('ERROR FETCH DATA!')
                console.error('jqXHR : '+jqXHR)
                console.error('status: '+textStatus)
                console.error('error : '+errorThrown)
                console.groupEnd()
            }
        })
    });
    </script>

</head>

<body id="page-top" class="index" style="min-height: 100vh;
                                        display: grid;
                                        grid-template-rows: auto 1fr auto;
                                        grid-template-columns: 100%;">

    <nav class="bg-gray-900 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">

                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="<?= base_url() ?>" class="text-white text-xl uppercase">Website CV. PADMA</a>
                    </div>
                    <div class="hidden sm:block sm:ml-6 w-full flex">
                        <div class="flex space-x-4 justify-end">
                            <a href="<?= base_url() ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium uppercase" aria-current="page">Home</a>

                            <a href="<?= base_url('provinsi') ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium uppercase">Daerah</a>

                            <?php if (isset($_SESSION['username'])) : ?>
                                <a href="<?= base_url('auth/') ?>" class="text-white hover:bg-red-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium bg-red-600 uppercase">Logout</a>
                            <?php else : ?>
                                <a href="<?= base_url('auth') ?>" class="text-white hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium bg-green-600 uppercase">Login</a>
                            <?php endif; ?>
                            
                            <button id="search-navbar" type="button" class="text-gray-300 bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm focus:ring focus:ring-gray-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sm:hidden text-center border-t border-gray-700 bg-gray-800" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="<?= base_url('provinsi') ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium uppercase" aria-current="page">Home</a>

                <a href="<?= base_url('provinsi') ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium uppercase">Daerah</a>

                <?php if (isset($_SESSION['username'])) : ?>
                    <a href="<?= base_url('auth/') ?>" class="text-white hover:bg-red-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium bg-red-600 uppercase">Logout</a>
                <?php else : ?>
                    <a href="<?= base_url('auth') ?>" class="text-white hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium bg-green-600 uppercase">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    
    <div id="search-wrapper" class="flex bg-black bg-opacity-50 h-screen fixed w-screen" style="z-index: 9999999;">
        <button type="button" id="closeSearch" class="close fixed top-7 right-7 text-black text-xl bg-gray-300 p-2 rounded-full">
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>

        <form method="POST" action="<?= base_url('objek/cariObjek')?>" style="display: flex; margin: auto;">
            <select id="select2_provinsi" type="text" name="jenis_post_tangible" required class="block w-full py-2 px-3 border border-gray-300 bg-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"></select>

            <input name="query" type="text" class="mx-2 px-2 focus:ring-green-500 focus:border-green-500 block w-60 shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-200" value="" placeholder="Cari Sesuatu..." />

            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Cari</button>
        </form>
    </div>

    <main style="height: 100%;">
