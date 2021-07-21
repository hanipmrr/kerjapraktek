<section id="headerwrap" class="fullheight"> 
    <div>
        <div class="col-lg-12 text-center ">
            <h2 class="section-heading" style="color:white">Daerah</h2>
            <div style="float:right">
                
                <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
                    <a href="<?= base_url('provinsi'); ?>">
                        <i class="previous">&laquo;</i> 
                        Kembali 
                    </a>
                </button>
                
                <?php if(isset($_SESSION['username'])) : ?>
                    <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
                        <a href="<?= base_url() ?>Daerah/tambah/<?= $id_prov ?>">
                            <i class="fa fa-plus"></i> 
                            Tambah 
                        </a>
                    </button>
                <?php endif; ?>

                <form action="" method="POST" class="form-inline my-2 mx-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" 
                    placeholder="Cari Nama Kabupaten" name="keyword" autocomplete="off" style="border-radius:15px">
                    <button class="py-2 px-6 bg-gray-50 rounded-md" 
                    type="submit" name="submit" style="margin-left:20px;">Search</button>
                </form>
                
            </div>
        </div>
    </div>


    <div class="section-inner">                
        <div class="container">
            <div class="row">
                <?php if(isset($daerah)) : ?>
                <?php foreach ($daerah as $kabupaten) : ?>
                    <div class="col-md-4 portfolio-item da-item wow fadeInUp" data-mh="blog-posts" >
                        <a >
                            <center>
                            <img src="<?php echo base_url('logo/daerah/'.$kabupaten['logo_daerah'])?>" class="img-responsive" alt="Image" style="width:250px;height:280px;">                             
                            </center>
                        </a>                        
                        <div class="item-caption">
                            <div class="col-lg-12 text-center" style="font-size:30px">
                            <a><?= $kabupaten['nama_daerah']; ?></a>
                            </div> 
                            <?php if(isset($_SESSION['username'])) : ?>
                            <div>
                            <a>Kode Daerah: <?= $kabupaten['kode_daerah']; ?></a>
                            </div>
                        <?php endif; ?>                                
                            <div class="text-center" >
                            <a class="btn btn-primary mt20" href="<?= base_url(); ?>tipe/index/<?= $id_prov ?>/<?= $kabupaten['id_daerah']?>/<?= $kabupaten['id_provinsi']?>">Lihat</a>

                            <?php if(isset($_SESSION['username'])&&
                            ($_SESSION['id_role']==1||
                            $_SESSION['id_provinsi']==$kabupaten['id_provinsi']) ) : ?>

                            <a class="btn btn-primary mt20" href="<?= base_url(); ?>daerah/updateDaerah/<?= $kabupaten['id_daerah']?>">Edit</a>
                            <a class="btn btn-primary mt20" style="background-color:#FF0000" onclick="return confirm('Apakah yakin ingin menghapus?')" href="<?= base_url(); ?>daerah/hapus/<?= $kabupaten['id_daerah']?>/<?=$kabupaten['id_provinsi']?>">Hapus</a>
                            <?php endif; ?>

                        </div>
                        </div>               
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>  
            </div>
        </div>
    </div>
    
    <div class="justify-content-center d-flex mt-2" style="float:center"></div>
      <nav style="display: flex; justify-content: center; user-select: none;">
          <ul class="pagination">

                <!-- Navigasi Kiri -->
                <?php if($halaman == 1) :?>
                    <li class="disabled"><span>Pertama</span></li>
                    <li class="disabled"><span>&laquo;</span></li>
                <?php else: ?>
                    <li><a href="<?= base_url('/daerah/index/'.$id_prov.'/1')?>">Pertama</a></li>
                    <li><a href="<?= base_url('/daerah/index/'.$id_prov.'/'.$sebelumnya)?>">&laquo;</a></li>
                <?php endif; ?>

                <!-- Navigasi Angka -->
                <?php for($i=1; $i<=$total_halaman; $i++): 
                    $halaman_aktif = $halaman == $i ? 'active' : '' ?>
                    <li class="<?= $halaman_aktif ?>"><a href="<?= base_url('/daerah/index/'.$id_prov.'/'.$i)?>"><?= $i ?></a></li>
                <?php endfor; ?>

                <!-- Navigasi Kanan -->
                <?php if($halaman == $total_halaman): ?>
                    <li class="disabled"><span>&raquo;</span></li>
                    <li class="disabled"><span>Akhir</span></li>
                <?php else : ?>
                    <li><a href="<?= base_url('/daerah/index/'.$id_prov.'/'.$berikutnya)?>">&raquo;</a></li>
                    <li><a href="<?= base_url('/daerah/index/'.$id_prov.'/'.$total_halaman)?>">Akhir</a></li>
                <?php endif;?>

            </ul>
      </nav>
    </div>
</section>
                        
                        