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
