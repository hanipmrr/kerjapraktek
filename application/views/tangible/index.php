<section id="headerwrap" class="fullheight">
    <div>
        <div class="col-lg-12 text-center">
            
        <h2 class="section-heading" style="color:white">Tangible</h2>

            <div class="flex flex-col" style="float:right">
                <div class="flex justify-end">
                    <button type="button" class="py-2 px-6 bg-gray-50 rounded-md"
                            onclick="location.href='<?= base_url('tipe/index/'.$id_prov.'/'.$id_daerah) ?>'"> 
                            <i class="previous">&laquo;</i>
                            Kembali 
                    </button>


                        <?php 
                        if(isset($_SESSION['username']) && 
                                ($_SESSION['id_role'] == 1 || 
                                $_SESSION['id_provinsi'] == $id_prov)) 
                        : ?>
                        <button class="ml-2 py-2 px-5 bg-gray-50 rounded-md"
                                onclick="location.href='<?= base_url('tangible/tambah/'.$id_prov.'/'.$id_daerah.'/'.$id_tipe) ?>'">
                            <i class="fa fa-plus"></i>
                            Tambah 
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
<div class="w-full mt-32 mb-10">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 sm:grid-cols-1 lg:grid-cols-3 gap-5">                  
            <?php if(isset($tangible)) : foreach ($tangible as $t) : ?>                   
                
                <div class="portfolio-item">
                    <img class="mx-auto" src="<?= base_url('logo/tangible/'.$t['logo_tangible']) ?>" class="img-responsive" alt="Image" style="width:250px;height:280px;" title="<?= $t['nama_tangible'] ?>">                               

                    <div class="bg-white px-5 text-center border-2 border-black rounded-lg item-caption">                    
                        <div class="pt-5">
                            <h1 class="text-2xl">
                                <?= $t['nama_tangible']; ?>
                            </h1>                               
                        </div>
                        
                        <div class="text-center mt-6">
                            <button class="mb-5 px-4 py-2 bg-green-500 text-white rounded-md" title="Lihat <?= $t['nama_tangible'] ?>"
                                    onClick="location.href='<?= base_url('objek/index/'.$id_prov.'/'.$id_daerah.'/'.$t['id_tipe'].'/'.$t['id_tangible']) ?>'">
                                    Lihat
                            </button>

                            <?php 
                            if(isset($_SESSION['username']) && 
                                    ($_SESSION['id_role'] == 1 || 
                                    $_SESSION['id_provinsi'] == $id_prov)) 
                            : ?>
                            <button class="mb-5 px-4 py-2 bg-yellow-500 text-white rounded-md" title="Ubah <?= $t['nama_tangible'] ?>"
                                    onclick="location.href='<?= base_url('tangible/updateTangible/'.$id_prov.'/'.$id_daerah.'/'.$t['id_tipe'].'/'.$t['id_tangible']) ?>'">
                                    Edit
                            </button>
                            <button class="mb-5 px-4 py-2 bg-red-500 text-white rounded-md" title="Hapus <?= $t['nama_tangible'] ?>"
                                    onclick="return confirm('Apakah yakin ingin menghapus?') ? location.href='<?= base_url('tangible/hapus/'.$id_prov.'/'.$id_daerah.'/'.$t['id_tipe'].'/'.$t['id_tangible']) ?>' : ''">
                                    Hapus
                            </button>
                            <?php endif; ?>
                            
                        </div>    
                    </div>     
                </div>                    
            <?php endforeach; endif; ?>          
        </div>
    </div>
</div>   

</section>
                        
                        