<section id="headerwrap" class="fullheight">
<div>
  <div class="col-lg-12 text-center ">
        <h2 class="section-heading" style="color:white">Objek</h2>
        <div style="float:right">
            
            <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
                <a href="<?= base_url(); ?>tangible/index/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_provinsi ?>">
                    <i class="previous">&laquo;</i> 
                    Kembali 
                </a>
            </button> 
            
            <?php if(isset($_SESSION['username'])&&
            ($_SESSION['id_role']==1||
            $_SESSION['id_provinsi']==$id_provinsi) ) : ?>
            <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
                <!-- 
                    $id_prov, 
                    $id_daerah, 
                    $id_tipe,
                    $id_tangible
                 -->
                <a href="<?= base_url() ?>objek/tambah/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$id_provinsi?>">
                    <i class="fa fa-plus"></i> 
                    Tambah 
                </a>
            </button> 
            <?php endif; ?>
        </div>
    </div>
</div>
            
    <div>
        <div class="section-inner">
            <div class="container">        
                <div class="row">                  
                    <?php if(isset($objek)) : ?>
                        <?php foreach ($objek as $obj) : { $detail = word_limiter($obj['detail_post_tangible'], 25); } ?>

                            <div class="col-md-4 portfolio-item da-item wow fadeInUp" data-mh="blog-posts" style="margin-bottom:20px">
                                <a><center>                        
                                <img src="<?php echo base_url('logo/objek/'.$obj['logo_post_tangible'])?>" class="img-responsive" alt="Image" style="width:350px;height:300px;">                             
                                </center> </a>   
                                <div class="item-caption">           

                                    <div class="col-lg-12" style="font-size:30px">
                                        <a><?= $obj['nama_post_tangible']; ?></a>                                                          
                                    </div>  

                                    <div>
                                        <a><?php echo $detail;?></a>
                                    </div> 

                                    <div>
                                        <!-- 
                                            $id_prov, 
                                            $id_daerah, 
                                            $id_tipe,
                                            $id_tangible,
                                            $id_post_tangible
                                         -->
                                        <a class="btn btn-primary mt20" href="<?= base_url(); ?>objek/post/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$obj['id_post_tangible'].'/'.$id_provinsi ?>">Read More</a>
                                        <?php if(isset($_SESSION['username'])&&
                                        ($_SESSION['id_role']==1||
                                        $_SESSION['id_provinsi']==$obj['id_provinsi']) ) : ?>
                                            <a class="btn btn-primary mt20" href="<?= base_url(); ?>objek/updateObjek/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$obj['id_post_tangible'].'/'.$id_provinsi ?>">Edit</a>
                                        <?php endif; ?>
                                        <a class="btn btn-primary mt20" 
                                        style="background-color:#FF0000" 
                                        onclick="return confirm('Apakah yakin ingin menghapus?')" 
                                        href="<?= base_url(); ?>objek/hapus/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$obj['id_post_tangible'].'/'.$id_provinsi ?>">Hapus</a>
                                    </div>

                                </div>                   
                            </div>   

                        <?php endforeach; ?>
                    <?php endif; ?>                 
                </div>
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
                    <li><a href="<?= base_url('/objek/index/'.$id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$obj['id_post_tangible'].'/'.$id_provinsi.'/1')?>">Pertama</a></li>
                    <li><a href="<?= base_url('/objek/index/'.$id_prov.'/'.$sebelumnya.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$obj['id_post_tangible'].'/'.$id_provinsi)?>">&laquo;</a></li>
                <?php endif; ?>

                <!-- Navigasi Angka -->
                <?php for($i=1; $i<=$total_halaman; $i++): 
                    $halaman_aktif = $halaman == $i ? 'active' : '' ?>
                    <li class="<?= $halaman_aktif ?>"><a href="<?= base_url('/objek/index/'.$id_prov.'/'.$i.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$obj['id_post_tangible'].'/'.$id_provinsi)?>"><?= $i ?></a></li>
                <?php endfor; ?>

                <!-- Navigasi Kanan -->
                <?php if($halaman == $total_halaman): ?>
                    <li class="disabled"><span>&raquo;</span></li>
                    <li class="disabled"><span>Akhir</span></li>
                <?php else : ?>
                    <li><a href="<?= base_url('/objek/index/'.$id_prov.'/'.$berikutnya.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$obj['id_post_tangible'].'/'.$id_provinsi)?>">&raquo;</a></li>
                    <li><a href="<?= base_url('/objek/index/'.$id_prov.'/'.$total_halaman.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$obj['id_post_tangible'].'/'.$id_provinsi)?>">Akhir</a></li>
                <?php endif;?>

            </ul>
      </nav>
    </div>
</section>