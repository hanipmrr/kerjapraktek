<section id="headerwrap" class="fullheight">
    <?php
    /**
     *   <div class="row" >
     *       <div class="col-lg-12 text-center ">
     *           <h2 class="section-heading" style="color:white">Tipe Benda</h2>    
     *           <div style="float:right">
     *               <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
     *                   <a href="<?= base_url(); ?>daerah/index/<?= $id_prov ?>">
     *                       <i class="previous">&laquo;</i> 
     *                       Kembali 
     *                   </a>
     *               </button>    
     *               
     *               <?php if(isset($_SESSION['username'])&&
     *               ($_SESSION['id_role']==1||
     *               $_SESSION['id_provinsi']== $id_prov) ) : ?>
     *               <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
     *                   <a href="<?= base_url() ?>tipe/tambah/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $id_prov?>">
     *                       <i class="fa fa-plus"></i> 
     *                       Tambah 
     *                   </a>
     *               </button>
     *               <?php endif; ?>
     *           </div>
     *       </div>
     *   </div>
     */
    ?>

    <div>
        <div class="col-lg-12 text-center">
            <h2 class="section-heading" style="color:white">Tipe</h2>
            <div class="flex flex-col" style="float:right">
                <div class="flex justify-end">
                    <button class="py-2 px-6 bg-gray-50 rounded-md"
                            onclick="location.href='<?= base_url(); ?>daerah/index/<?= $id_prov ?>'"> 
                            <i class="previous">&laquo;</i>
                            Kembali 
                    </button>


                    <?php 
                        if(isset($_SESSION['username']) && 
                                ($_SESSION['id_role'] == 1 || 
                                $_SESSION['id_provinsi'] == $id_prov)) 
                    : ?>
                        <button class="ml-2 py-2 px-5 bg-gray-50 rounded-md"
                                onclick="location.href='<?= base_url() ?>tipe/tambah/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $id_prov?>'">
                            <i class="fa fa-plus"></i>
                            Tambah 
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php 
    /**
    *    <div class="section-inner">
    *        <div class="container">        
    *            <div class="row">                   
    *                <?php if(isset($tipe)) : ?>
    *                    <?php foreach ($tipe as $t) : ?>
    *                        <div class="col-md-4 portfolio-item da-item wow fadeInUp" data-mh="blog-posts">
    *                            <a>
    *                            <center>
    *                                <img src="<?php echo base_url('logo/tipe/'.$t['logo_tipe'])?>" class="img-responsive" alt="Image" style="width:250px;height:280px;">                             
    *                            </center>
    *                            </a>
    *                        <div class="item-caption">                            
    *                            <div class="col-lg-12 text-center" style="font-size:30px">
    *                            <a ><?= $t['nama_tipe']; ?></a>                               
    *                        </div>       
    *                            <div class="text-center">                             
    *                                <a class="btn btn-primary mt20" href="<?= base_url(); ?>tangible/index/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $t['id_tipe']?>/<?= $t['id_provinsi']?>">Lihat</a> 
    *                               
    *                                <?php if(isset($_SESSION['username'])&&
    *                                ($_SESSION['id_role']==1||
    *                                $_SESSION['id_provinsi']==$t['id_provinsi']) ) : ?>
    *
    *                                <a class="btn btn-primary mt20" href="<?= base_url(); ?>tipe/updateTipe/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $t['id_tipe']?>/<?= $t['id_provinsi'] ?>">Edit</a>
    *                                <a class="btn btn-primary mt20" 
    *                                    style="background-color:#FF0000" 
    *                                    onclick="return confirm('Apakah yakin ingin menghapus?')" 
    *                                    href="<?= base_url(); ?>tipe/hapus/<?= $id_prov.'/'.$id_daerah.'/'.$t['id_tipe']?>/<?= $t['id_provinsi'] ?>">Hapus</a>  
    *                                <?php endif; ?>
    *                            </div>
    *                        </div>                    
    *                    </div> 
    *                    <?php endforeach; ?>
    *                <?php endif; ?>              
    *            </div>
    *        </div>
    *    </div>
    */
    ?>

    <div class="w-full mt-32 mb-10">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 sm:grid-cols-1 lg:grid-cols-3 gap-5">                  
                <?php if(isset($tipe)) : foreach ($tipe as $t) : ?>                   
                  
                    <div class="portfolio-item">
                        <img class="mx-auto" src="<?= base_url('logo/tipe/'.$t['logo_tipe']) ?>" class="img-responsive" alt="Image" style="width:250px;height:280px;" title="<?= $t['nama_tipe'] ?>">                               
    
                        <div class="bg-white px-5 text-center border-2 border-black rounded-lg item-caption">                    
                            <div class="pt-5">
                                <h1 class="text-2xl">
                                    <?= $t['nama_tipe']; ?>
                                </h1>                               
                            </div>
                            
                            <div class="text-center mt-6">
                                <button class="mb-5 px-4 py-2 bg-green-500 text-white rounded-md" title="Lihat <?= $t['nama_tipe'] ?>"
                                        onclick="location.href='<?= base_url('tangible/index/'.$id_prov.'/'.$id_daerah.'/'.$t['id_tipe']) ?>'">
                                        Lihat
                                </button>
                                <button class="mb-5 px-4 py-2 bg-yellow-500 text-white rounded-md" title="Ubah <?= $t['nama_tipe'] ?>"
                                        onclick="location.href='<?= base_url('tipe/updateTipe/'.$id_prov.'/'.$id_daerah.'/'.$t['id_tipe']) ?>'">
                                        Edit
                                </button>
                                <button class="mb-5 px-4 py-2 bg-red-500 text-white rounded-md" title="Hapus <?= $t['nama_tipe'] ?>"
                                        onclick="return confirm('Apakah yakin ingin menghapus?') ? location.href='<?= base_url('tipe/updateTipe/'.$id_prov.'/'.$id_daerah.'/'.$t['id_tipe']) ?>' ? ''">
                                        Hapus
                                </button>
                            </div>    
                        </div>     
                    </div>                    
                <?php endforeach; endif; ?>          
            </div>
        </div>
    </div>   

</section>

