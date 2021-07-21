<section id="headerwrap" class="fullheight">
    <div class="row" >
        <div class="col-lg-12 text-center ">
            <h2 class="section-heading" style="color:white">Tipe Benda</h2>    
            <div style="float:right">
                <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
                    <a href="<?= base_url(); ?>daerah/index/<?= $id_prov ?>">
                        <i class="previous">&laquo;</i> 
                        Kembali 
                    </a>
                </button>    
                
                <?php if(isset($_SESSION['username'])&&
                ($_SESSION['id_role']==1||
                $_SESSION['id_provinsi']== $id_provinsi) ) : ?>
                <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
                    <a href="<?= base_url() ?>tipe/tambah/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $id_provinsi?>">
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
                <?php if(isset($tipe)) : ?>
                    <?php foreach ($tipe as $t) : ?>
                        <div class="col-md-4 portfolio-item da-item wow fadeInUp" data-mh="blog-posts">
                            <a>
                            <center>
                                <img src="<?php echo base_url('logo/tipe/'.$t['logo_tipe'])?>" class="img-responsive" alt="Image" style="width:250px;height:280px;">                             
                            </center>
                            </a>
                        <div class="item-caption">                            
                            <div class="col-lg-12 text-center" style="font-size:30px">
                            <a ><?= $t['nama_tipe']; ?></a>                               
                        </div>       
                            <div class="text-center">                             
                                <a class="btn btn-primary mt20" href="<?= base_url(); ?>tangible/index/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $t['id_tipe']?>/<?= $t['id_provinsi']?>">Lihat</a> 
                               
                                <?php if(isset($_SESSION['username'])&&
                                ($_SESSION['id_role']==1||
                                $_SESSION['id_provinsi']==$t['id_provinsi']) ) : ?>

                                <a class="btn btn-primary mt20" href="<?= base_url(); ?>tipe/updateTipe/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $t['id_tipe']?>/<?= $id_provinsi ?>">Edit</a>
                                <a class="btn btn-primary mt20" 
                                    style="background-color:#FF0000" 
                                    onclick="return confirm('Apakah yakin ingin menghapus?')" 
                                    href="<?= base_url(); ?>tipe/hapus/<?= $id_prov.'/'.$id_daerah.'/'.$t['id_tipe']?>/<?= $id_provinsi ?>">Hapus</a>  
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

