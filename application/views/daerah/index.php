<section id="headerwrap" class="fullheight"> 
    <?php
        /**
        *        <!-- <div>
        *        <div class="col-lg-12 text-center ">
        *            <h2 class="section-heading" style="color:white">Daerah</h2>
        *            <div style="float:right">
        *                
        *                <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
        *                    <a href="<?= base_url('provinsi'); ?>">
        *                        <i class="previous">&laquo;</i> 
        *                        Kembali 
        *                    </a>
        *                </button>
        *                
        *                <?php if(isset($_SESSION['username'])) : ?>
        *                    <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
        *                        <a href="<?= base_url() ?>Daerah/tambah/<?= $id_prov ?>">
        *                            <i class="fa fa-plus"></i> 
        *                            Tambah 
        *                        </a>
        *                    </button>
        *                <?php endif; ?>
        *
        *                <form action="" method="POST" class="form-inline my-2 mx-2 my-lg-0">
        *                    <input class="form-control mr-sm-2" type="search" 
        *                    placeholder="Cari Nama Kabupaten" name="keyword" autocomplete="off" style="border-radius:15px">
        *                    <button class="py-2 px-6 bg-gray-50 rounded-md" 
        *                    type="submit" name="submit" style="margin-left:20px;">Search</button>
        *                </form>
        *                
        *            </div>
        *        </div>
        *    </div> -->
         */
    ?>

    <div>
        <div class="col-lg-12 text-center">
            <h2 class="section-heading" style="color:white">Daerah</h2>

            <div class="flex flex-col" style="float:right">
                <div class="flex justify-end">
                    <button class="py-2 px-6 bg-gray-50 rounded-md"
                            onclick="location.href='<?= base_url('provinsi') ?>'"> 
                            <i class="previous">&laquo;</i>
                            Kembali 
                    </button>

                    <?php if(isset($_SESSION['username'])) : ?>
                        <button class="ml-2 py-2 px-5 bg-gray-50 rounded-md"
                                onclick="location.href='<?= base_url() ?>Daerah/tambah/<?= $id_prov ?>'">
                            <i class="fa fa-plus"></i>
                            Tambah 
                        </button>
                    <?php endif; ?>
                </div>
                
                <form action="<?= base_url('/provinsi/index')?>" method="POST" class="flex mt-2">
                    
                    <input type="text" type="search" placeholder="Cari Nama Provinsi" name="keyword" class="py-2 px-4 focus:ring focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <button class="ml-2 py-1 px-9 bg-gray-50 rounded-md" type="submit" name="submit">Search</button>

                </form>
            </div>
        </div>
    </div>

    <?php 
    /*
    *    <!-- <div class="section-inner">                
    *        <div class="container">
    *            <div class="row">
    *            <?php if(isset($daerah)) : ?>
    *                <?php foreach ($daerah as $kabupaten) : ?>
    *                    <div class="col-md-4 portfolio-item da-item wow fadeInUp" data-mh="blog-posts" >
    *                        <a >
    *                            <center>
    *                            <img src="<?php echo base_url('logo/daerah/'.$kabupaten['logo_daerah'])?>" class="img-responsive" alt="Image" style="width:250px;height:280px;">                             
    *                            </center>
    *                        </a>                        
    *                        <div class="item-caption">
    *                            <div class="col-lg-12 text-center" style="font-size:30px">
    *                            <a><?= $kabupaten['nama_daerah']; ?></a>
    *                            </div> 
    *                            <?php if(isset($_SESSION['username'])) : ?>
    *                            <div>
    *                            <a>Kode Daerah: <?= $kabupaten['kode_daerah']; ?></a>
    *                            </div>
    *                        <?php endif; ?>                                
    *                            <div class="text-center" >
    *                            <a class="btn btn-primary mt20" href="<?= base_url(); ?>tipe/index/<?= $id_prov ?>/<?= $kabupaten['id_daerah']?>">Lihat</a>
    *
    *                            <?php if(isset($_SESSION['username'])&&
    *                            ($_SESSION['id_role']==1||
    *                            $_SESSION['id_provinsi']==$kabupaten['id_provinsi']) ) : ?>
    *
    *                            <a class="btn btn-primary mt20" href="<?= base_url(); ?>daerah/updateDaerah/<?= $kabupaten['id_daerah']?>">Edit</a>
    *                            <a class="btn btn-primary mt20" style="background-color:#FF0000" onclick="return confirm('Apakah yakin ingin menghapus?')" href="<?= base_url(); ?>daerah/hapus/<?= $kabupaten['id_daerah']?>/<?=$kabupaten['id_provinsi']?>">Hapus</a>
    *                            <?php endif; ?>
    *
    *                        </div>
    *                        </div>               
    *                    </div>
    *                <?php endforeach; ?>
    *                <?php endif; ?>  
    *            </div>
    *        </div>
    *    </div> -->
    */
    ?>

    <div class="w-full mt-32 mb-10">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 sm:grid-cols-1 lg:grid-cols-3 gap-5">                  
                <?php if(isset($daerah)) : foreach ($daerah as $kabupaten) : ?>                   
                  
                    <div class="portfolio-item">
                        <img class="mx-auto" src="<?= base_url('logo/daerah/'.$kabupaten['logo_daerah'])?>" class="img-responsive" alt="Image" style="width:250px;height:280px;" title="<?= $kabupaten['nama_daerah'] ?>">                               
    
                        <div class="bg-white px-5 text-center border-2 border-black rounded-lg item-caption">                    
                            <div class="pt-5">
                                <h1 class="text-2xl">
                                    <?= $kabupaten['nama_daerah']; ?>
                                </h1>                               
                                <!-- <div class="text-center" style="font-size:30px">
                                </div> -->
                                <?php if(isset($_SESSION['username']) && ($_SESSION['id_role']==1|| $_SESSION['id_provinsi']==$kabupaten['id_provinsi'])) : ?>
                                    <span class="font-medium">
                                        Kode Provinsi: <?= $kabupaten['kode_daerah'] ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="text-center mt-6">
                                <button class="mb-5 px-4 py-2 bg-green-500 text-white rounded-md" title="Lihat <?= $kabupaten['nama_daerah'] ?>"
                                        onclick="location.href='<?= base_url(); ?>tipe/index/<?= $id_prov ?>/<?= $kabupaten['id_daerah']?>'">
                                        Lihat
                                </button>
                                <button class="mb-5 px-4 py-2 bg-yellow-500 text-white rounded-md" title="Ubah <?= $kabupaten['nama_daerah'] ?>"
                                        onclick="location.href='<?= base_url(); ?>daerah/updateDaerah/<?= $kabupaten['id_daerah']?>'">
                                        Edit
                                </button>
                                <button class="mb-5 px-4 py-2 bg-red-500 text-white rounded-md" title="Hapus <?= $kabupaten['nama_daerah'] ?>"
                                        onclick="return confirm('Apakah yakin ingin menghapus?') ? location.href='<?= base_url(); ?>daerah/hapus/<?= $kabupaten['id_daerah']?>/<?=$kabupaten['id_provinsi']?>' ? : ''">
                                        Hapus
                                </button>
                            </div>    
                        </div>     
                    </div>                    
                <?php endforeach; endif; ?>          
            </div>
        </div>
    </div>                  

    <?php if($total_halaman > 1) :?>
        <div class="justify-content-center d-flex mt-2" style="float:center"></div>
            <nav style="display: flex; justify-content: center; user-select: none;">
                <ul class="flex pl-0 list-none rounded my-2">

                    <!-- Navigasi Kiri -->
                    <?php if($halaman == 1) :?>
                        <li><span class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-green-500 border-r-0 ml-0 rounded-l disabled">Pertama</span></li>
                        <li><span class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-green-500 border-r-0 disabled">&laquo;</span></li>
                    <?php else: ?>
                        <li><a class="cursor-pointer relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-green-500 border-r-0 ml-0 rounded-l hover:bg-gray-200" href="<?= base_url('/daerah/index/'.$id_prov.'/1')?>">Pertama</a></li>
                        <li><a class="cursor-pointer relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-green-500 border-r-0 hover:bg-gray-200" href="<?= base_url('/daerah/index/'.$id_prov.'/'.$sebelumnya)?>">&laquo;</a></li>
                    <?php endif; ?>

                    <!-- Navigasi Angka -->
                    <?php for($i=1; $i<=$total_halaman; $i++): 
                        $halaman_aktif = $halaman == $i ? 'bg-green-500 text-white hover:bg-green-600' : 'text-green-500' ?>
                        <li><a class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 border-r-0 hover:bg-gray-200 <?= $halaman_aktif ?>" href="<?= base_url('/daerah/index/'.$id_prov.'/'.$i)?>"><?= $i ?></a></li>
                    <?php endfor; ?>

                    <!-- Navigasi Kanan -->
                    <?php if($halaman == $total_halaman): ?>
                        <li><span class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-green-500 border-r-0 disabled">&raquo;</span></li>
                        <li><span class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-green-500 rounded-r disabled">Akhir</span></li>
                    <?php else : ?>
                        <li><a class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-green-500 border-r-0 hover:bg-gray-200" href="<?= base_url('/daerah/index/'.$id_prov.'/'.$berikutnya)?>">&raquo;</a></li>
                        <li><a class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-green-500 rounded-r hover:bg-gray-200" href="<?= base_url('/daerah/index/'.$id_prov.'/'.$total_halaman)?>">Akhir</a></li>
                    <?php endif;?>

                </ul>
            </nav>
        </div>
    <?php endif;?>
</section>
                        
                        