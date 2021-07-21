<section id="headerwrap" class="fullheight">
    <div class="row">
        <div class="col-lg-12 text-center ">
            <h2 class="section-heading" style="color:white">Tangible</h2>
            <div style="float:right">

                <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
                    <a href="<?= base_url(); ?>tipe/index/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $id_provinsi ?>">
                        <i class="previous">&laquo;</i> 
                        Kembali 
                    </a>
                </button>   

                <?php if(isset($_SESSION['username'])&&
                ($_SESSION['id_role']==1||
                $_SESSION['id_provinsi']==$id_provinsi) ) : ?>

                    <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
                        <a href="<?= base_url() ?>tangible/tambah/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $id_tipe ?>/<?= $id_provinsi ?>">
                            <i class="fa fa-plus"></i> 
                            Tambah 
                        </a>
                    </button>

                <?php endif; ?>      
            </div>
        </div>
    </div>

    <div class="section-inner">
        <div class="container">        
            <div class="row">                 
                <?php if(isset($tangible)) : ?>
                <?php foreach ($tangible as $tangibel) : ?>
                    <div class="col-md-4 portfolio-item da-item wow fadeInUp" data-mh="blog-posts" style="margin-bottom:20px">
                        <a>
                        <center>
                            <img src="<?php echo base_url('logo/tangible/'.$tangibel['logo_tangible'])?>" class="img-responsive" alt="Image" style="width:350px;height:250px;">                             
                        </center>
                        </a>
                        <div class="item-caption">                        
                            <div class="col-lg-12 text-center" style="font-size:30px">
                                <a ><?= $tangibel['nama_tangible']; ?></a>
                            </div>       
                            <div class="text-center">
                                <a class="btn btn-primary mt20" href="<?= base_url(); ?>objek/index/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$tangibel['id_tangible'].'/'.$tangibel['id_provinsi'] ?>">Lihat</a>
                                <?php if(isset($_SESSION['username'])&&
                                ($_SESSION['id_role']==1||
                                $_SESSION['id_provinsi']==$tangibel['id_provinsi']) ) : ?>
                                <a class="btn btn-primary mt20" href="<?= base_url(); ?>tangible/updateTangible/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$tangibel['id_tangible']. '/' .$id_provinsi?>">Edit</a>
                                <a class="btn btn-primary mt20" 
                                   style="background-color:#FF0000" 
                                   onclick="return confirm('Apakah yakin ingin menghapus?')" 
                                   href="<?= base_url(); ?>tangible/hapus/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$tangibel['id_tangible']. '/' .$id_provinsi?>">Hapus</a> 
                                <?php endif; ?>  
                            </div>
                        </div>                   
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
                        
                        