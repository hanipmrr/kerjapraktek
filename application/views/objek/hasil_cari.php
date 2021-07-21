<section id="headerwrap" class="fullheight">
<div>
    <div class="col-lg-12 text-center ">
        <h2 class="section-heading" style="color:white">Hasil Pencarian Dari <?= $query ?></h2>
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
                                        <a class="btn btn-primary mt20" href="<?= base_url(); ?>objek/post/<?= $obj['id_provinsi'].'/'.$obj['id_daerah'].'/'.$obj['id_tipe'].'/'.$obj['id_tangible'].'/'.$obj['id_post_tangible'].'/'.$obj['id_provinsi'] ?>">Read More</a>
                                        <?php if(isset($_SESSION['username'])) : ?>
                                            <a class="btn btn-primary mt20" href="<?= base_url(); ?>objek/updateObjek/<?= $obj['id_provinsi'].'/'.$obj['id_daerah'].'/'.$obj['id_tipe'].'/'.$obj['id_tangible'].'/'.$obj['id_post_tangible'].'/'.$obj['id_provinsi'] ?>">Edit</a>
                                        <?php endif; ?>
                                        <a class="btn btn-primary mt20" 
                                        style="background-color:#FF0000" 
                                        onclick="return confirm('Apakah yakin ingin menghapus?')" 
                                        href="<?= base_url(); ?>objek/hapus/<?= $obj['id_provinsi'].'/'.$obj['id_daerah'].'/'.$obj['id_tipe'].'/'.$obj['id_tangible'].'/'.$obj['id_post_tangible'].'/'.$obj['id_provinsi'] ?>">Hapus</a>
                                    </div>

                                </div>                   
                            </div>   

                        <?php endforeach; ?>
                    <?php endif; ?>                 
                </div>
            </div>
        </div>
    </div>
</section>