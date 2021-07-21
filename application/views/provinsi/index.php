<section id="headerwrap" class="fullheight">
    <div>
        <div class="col-lg-12 text-center ">
            <h2 class="section-heading" style="color:white">Provinsi</h2>
            <div style="float:right">

                <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
                    <a href="<?= base_url(); ?>">
                        <i class="previous">&laquo;</i>
                        Kembali 
                    </a>
                </button>

                <?php if(isset($_SESSION['username'])) : ?>
                <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
                    <a href="<?= base_url() ?>provinsi/tambah">
                        <i class="fa fa-plus"></i>
                        Tambah 
                    </a>
                </button>
                <?php endif; ?>
                    <!-- HALO HANIP I'M BACK :) -->
                <form action="" method="POST" class="form-inline my-2 mx-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" 
                    placeholder="Cari Nama Provinsi" name="keyword" autocomplete="off" style="border-radius:15px">
                    <button class="py-2 px-6 bg-gray-50 rounded-md" 
                    type="submit" name="submit" style="margin-left:20px;">Search</button>
                </form>
                
            </div>
        </div>
    </div>
    
    <div class="section-inner">
        <div class="container">        
            <div class="row">                  
                <?php if(isset($provinsi)) : ?>
                <?php foreach ($provinsi as $prov) : ?>
                    <div class="col-md-4 portfolio-item da-item wow fadeInUp" data-mh="blog-posts">
                        <a href="#" title="View Post">
                            <center>
                            <img src="<?php echo base_url('logo/provinsi/'.$prov['logo_provinsi'])?>" class="img-responsive" alt="Image" style="width:250px;height:280px;">                               
                            </center>
                        </a>
                    <div class="item-caption">     
                                           
                        <div class="col-lg-12 text-center" style="font-size:30px">
                        <a ><?= $prov['nama_provinsi']; ?></a>                               
                        </div>

                        <?php if(isset($_SESSION['username'])) : ?>
                        <div>
                        <a>Kode Provinsi: <?= $prov['kode_provinsi']; ?></a>
                        </div>
                        <?php endif; ?>  
                            <div class="text-center">
                            <a class="btn btn-primary mt20" href="<?= base_url(); ?>daerah/index/<?= $prov['id_provinsi']?>">Lihat</a>
                            <?php if(isset($_SESSION['username'])&&
                            ($_SESSION['id_role']==1) ) : ?>
                            <a class="btn btn-primary mt20" href="<?= base_url(); ?>provinsi/updateProv/<?= $prov['id_provinsi']?>">Edit</a>
                            <a class="btn btn-primary mt20" style="background-color:#FF0000" onclick="return confirm('Apakah yakin ingin menghapus?')" href="<?= base_url(); ?>provinsi/hapusProv/<?= $prov['id_provinsi']?>">Hapus</a>
                            <?php endif; ?>    
                        </div>
                    </div>                    
                    </div>   
                    <?php endforeach; ?>
                <?php endif; ?>          
            </div>
        </div>
    </div>
    
    <div style="display: flex; justify-content: center; user-select: none;">
       <?= $this->pagination->create_links();?>
    </div>

</section>
                        
