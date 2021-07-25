<section id="headerwrap" class="fullheight">
<?php
/**
*<div>
*  <div class="col-lg-12 text-center ">
*        <h2 class="section-heading" style="color:white">Objek</h2>
*        <div style="float:right">
*            
*            <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
*                <a href="<?= base_url(); ?>tangible/index/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_prov ?>">
*                    <i class="previous">&laquo;</i> 
*                    Kembali 
*                </a>
*            </button> 
*            
*            <?php if(isset($_SESSION['username'])&&
*            ($_SESSION['id_role']==1||
*            $_SESSION['id_provinsi'] == $id_prov) ) : ?>
*            <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"> 
*                <!-- 
*                    $id_prov, 
*                    $id_daerah, 
*                    $id_tipe,
*                    $id_tangible
*                 -->
*                <a href="<?= base_url() ?>objek/tambah/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$id_prov?>">
*                    <i class="fa fa-plus"></i> 
*                    Tambah 
*                </a>
*            </button> 
*            <?php endif; ?>
*        </div>
*    </div>
*</div>
*/
?> 

    <div>
        <div class="col-lg-12 text-center">
            <h2 class="section-heading" style="color:white">Objek</h2>
            <div class="flex flex-col" style="float:right">
                <div class="flex justify-end">
                    <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"
                            onclick="location.href='<?= base_url('tangible/index/'.$id_prov.'/'.$id_daerah.'/'.$id_tipe) ?>'"> 
                            <i class="previous">&laquo;</i>
                            Kembali 
                    </button>


                    <?php 
                        if(isset($_SESSION['username']) && 
                                ($_SESSION['id_role'] == 1 || 
                                $_SESSION['id_provinsi'] == $id_prov)) 
                    : ?>
                        <button class="ml-2 py-2 px-5 bg-gray-50 rounded-md"
                                onclick="location.href='<?= base_url('objek/tambah/'.$id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible) ?>'">
                                <i class="fa fa-plus"></i>
                                Tambah 
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php
/*
*    <div>
*        <div class="section-inner">
*            <div class="container">        
*                <div class="row">                  
*                    <?php if(isset($objek)) : ?>
*                        <?php foreach ($objek as $obj) : { $detail = word_limiter($obj['detail_post_tangible'], 25); } ?>
*
*                            <div class="col-md-4 portfolio-item da-item wow fadeInUp" data-mh="blog-posts" style="margin-bottom:20px">
*                                <a><center>                        
*                                <img src="<?php echo base_url('logo/objek/'.$obj['logo_post_tangible'])?>" class="img-responsive" alt="Image" style="width:350px;height:300px;">                             
*                                </center> </a>   
*                                <div class="item-caption">           
*
*                                    <div class="col-lg-12" style="font-size:30px">
*                                        <a><?= $obj['nama_post_tangible']; ?></a>                                                          
*                                    </div>  
*
*                                    <div>
*                                        <a><?php echo $detail;?></a>
*                                    </div> 
*
*                                    <div>
*                                        <a class="btn btn-primary mt20" href="<?= base_url(); ?>objek/post/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$obj['id_post_tangible'].'/'.$id_prov ?>">Read More</a>
*                                        <?php 
*                                        if(isset($_SESSION['username'])&&
*                                                ($_SESSION['id_role'] == 1 ||
*                                                 $_SESSION['id_provinsi']== $id_prov)
*                                          ) : ?>
*                                            <a class="btn btn-primary mt20" href="<?= base_url(); ?>objek/updateObjek/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$obj['id_post_tangible'].'/'.$id_prov ?>">Edit</a>
*                                            <a class="btn btn-primary mt20" 
*                                                style="background-color:#FF0000" 
*                                                onclick="return confirm('Apakah yakin ingin menghapus?')" 
*                                                href="<?= base_url(); ?>objek/hapus/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$obj['id_post_tangible'].'/'.$id_prov ?>">Hapus</a>
*                                        <?php endif; ?>
*                        
*                                    </div>
*
*                                </div>                   
*                            </div>   
*
*                        <?php endforeach; ?>
*                    <?php endif; ?>                 
*                </div>
*            </div>
*        </div>
*    </div> 
*/
?>

<div class="w-full mt-32 mb-10">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 sm:grid-cols-1 lg:grid-cols-3 gap-5">                  
            <?php if(isset($objek)) : foreach ($objek as $obj) : ?>                   
                
                <div class="portfolio-item">
                    <img class="mx-auto" src="<?= base_url('logo/objek/'.$obj['logo_post_tangible']) ?>" class="img-responsive" alt="Image" style="width:250px;height:280px;" title="<?= $obj['nama_post_tangible'] ?>">                               

                    <div class="bg-white px-5 text-center border-2 border-black rounded-lg item-caption">                    
                        <div class="pt-5">
                            <h1 class="text-2xl">
                                <?= $obj['nama_post_tangible'] ?>
                            </h1>                               
                        </div>
                        
                        <div class="text-center mt-6">
                            <button class="mb-5 px-4 py-2 bg-green-500 text-white rounded-md" title="Lihat <?= $obj['nama_post_tangible'] ?>"
                                    onclick="location.href='<?= base_url('objek/post/'.$id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$obj['id_post_tangible']) ?>'">
                                    Lihat
                            </button>
                            <button class="mb-5 px-4 py-2 bg-yellow-500 text-white rounded-md" title="Ubah <?= $obj['nama_post_tangible'] ?>"
                                    onclick="location.href='<?= base_url('objek/updateObjek/'.$id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$obj['id_post_tangible']) ?>'">
                                    Edit
                            </button>
                            <button class="mb-5 px-4 py-2 bg-red-500 text-white rounded-md" title="Hapus <?= $obj['nama_post_tangible'] ?>"
                                    onclick="return confirm('Apakah yakin ingin menghapus?') ? location.href='<?= base_url('objek/hapus/'.$id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$obj['id_post_tangible']) ?>' : '' ">
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
                        <li><span class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-gray-400 border-r-0 ml-0 rounded-l disabled">Pertama</span></li>
                        <li><span class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-gray-400 border-r-0 disabled">&laquo;</span></li>
                    <?php else: ?>
                        <li><a class="cursor-pointer relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-gray-900 border-r-0 ml-0 rounded-l hover:bg-gray-200" href="<?= base_url('/objek/index/'.$id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/1')?>">Pertama</a></li>
                        <li><a class="cursor-pointer relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-gray-900 border-r-0 hover:bg-gray-200" href="<?= base_url('/objek/index/'.$id_prov.'/'.$sebelumnya.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible) ?>">&laquo;</a></li>
                    <?php endif; ?>

                    <!-- Navigasi Angka -->
                    <?php for($i=1; $i<=$total_halaman; $i++): 
                        $halaman_aktif = $halaman == $i ? 'bg-gray-900 text-white hover:bg-gray-800 border-gray-900' : 'text-gray-900' ?>
                        <li><a class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 border-r-0 hover:bg-gray-200 <?= $halaman_aktif ?>" href="<?= base_url('/objek/index/'.$id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$i)?>"><?= $i ?></a></li>
                    <?php endfor; ?>

                    <!-- Navigasi Kanan -->
                    <?php if($halaman == $total_halaman): ?>
                        <li><span class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-gray-400 border-r-0 disabled">&raquo;</span></li>
                        <li><span class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-gray-400 rounded-r disabled">Akhir</span></li>
                    <?php else : ?>
                        <li><a class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-gray-900 border-r-0 hover:bg-gray-200" href="<?= base_url('/objek/index/'.$id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$berikutnya)?>">&raquo;</a></li>
                        <li><a class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-gray-900 rounded-r hover:bg-gray-200" href="<?= base_url('/objek/index/'.$id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$total_halaman)?>">Akhir</a></li>
                    <?php endif;?>

                </ul>
            </nav>
        </div>
    <?php endif;?>


</section>