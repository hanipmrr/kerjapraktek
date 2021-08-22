<section id="headerwrap" class="fullheight">
<div>
    <div class="col-lg-12 text-center ">
        <h2 class="section-heading" style="color:white">Hasil Pencarian Dari <?= $query ?></h2>
    </div>
</div>

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
                                    onclick="location.href='<?= base_url(); ?>objek/post/<?= $obj['id_provinsi'].'/'.$obj['id_daerah'].'/'.$obj['id_tipe'].'/'.$obj['id_tangible'].'/'.$obj['id_post_tangible'].'/'.$obj['id_provinsi'] ?>'">
                                    Lihat
                            </button>
                            <button class="mb-5 px-4 py-2 bg-yellow-500 text-white rounded-md" title="Ubah <?= $obj['nama_post_tangible'] ?>"
                                    onclick="location.href='<?= base_url(); ?>objek/updateObjek/<?= $obj['id_provinsi'].'/'.$obj['id_daerah'].'/'.$obj['id_tipe'].'/'.$obj['id_tangible'].'/'.$obj['id_post_tangible'].'/'.$obj['id_provinsi'] ?>'">
                                    Edit
                            </button>
                            <button class="mb-5 px-4 py-2 bg-red-500 text-white rounded-md" title="Hapus <?= $obj['nama_post_tangible'] ?>"
                                    onclick="return confirm('Apakah yakin ingin menghapus?') ? location.href='<?= base_url(); ?>objek/hapus/<?= $obj['id_provinsi'].'/'.$obj['id_daerah'].'/'.$obj['id_tipe'].'/'.$obj['id_tangible'].'/'.$obj['id_post_tangible'].'/'.$obj['id_provinsi'] ?>' : '' ">
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