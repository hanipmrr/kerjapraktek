<section id="headerwrap" class="fullheight">
    <div class="col-lg-12 text-center">
        <h2 class="section-heading" style="color:white">Provinsi</h2>
        <div class="flex flex-col" style="float:right">
            <div class="flex justify-end">
                <button class="py-2 px-6 bg-gray-50 rounded-md"
                        onclick="location.href='<?= base_url() ?>'"> 
                        <i class="previous">&laquo;</i>
                        Kembali
                </button>


                <?php if(isset($_SESSION['username'])) : ?>
                    <a class="ml-2 py-2 px-5 bg-gray-50 rounded-md" href="<?= base_url() ?>provinsi/tambah">
                        <i class="fa fa-plus"></i>
                        Tambah 
                    </a>
                <?php endif; ?>
                
            </div>
            <form action="<?= base_url('/provinsi/index')?>" method="POST" class="flex mt-2">
                
                <input type="text" type="search" placeholder="Cari Nama Provinsi" name="keyword" class="py-2 px-4 focus:ring focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                <button class="ml-2 py-1 px-9 bg-gray-50 rounded-md" type="submit" name="submit">Search</button>

            </form>
        </div>
    </div>

    <div class="w-full mt-32">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 sm:grid-cols-1 lg:grid-cols-3 gap-5">                  
                <?php if(isset($provinsi)) : foreach ($provinsi as $prov) : ?>                   
                  
                    <div class="portfolio-item">
                        <img class="mx-auto" src="<?php echo base_url('logo/provinsi/'.$prov['logo_provinsi'])?>" class="img-responsive" alt="Image" style="width:250px;height:280px;" title="<?= $prov['nama_provinsi'] ?>">                               
    
                        <div class="bg-white px-5 text-center border-2 border-black rounded-lg item-caption">                    
                            <div class="pt-5">
                                <h1 class="text-2xl">
                                    <?= $prov['nama_provinsi']; ?>
                                </h1>                               
                                <!-- <div class="text-center" style="font-size:30px">
                                </div> -->
                                <?php if(isset($_SESSION['username'])) : ?>
                                    <span class="font-medium">
                                        Kode Provinsi: <?= $prov['kode_provinsi'] ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="text-center mt-6">
                                <button class="mb-5 px-4 py-2 bg-green-500 text-white rounded-md" title="Lihat <?= $prov['nama_provinsi'] ?>"
                                        onclick="location.href='<?= base_url(); ?>daerah/index/<?= $prov['id_provinsi']?>'">
                                        Lihat
                                </button>
                                <button class="mb-5 px-4 py-2 bg-yellow-500 text-white rounded-md" title="Ubah <?= $prov['nama_provinsi'] ?>"
                                        onclick="location.href='<?= base_url(); ?>provinsi/updateProv/<?= $prov['id_provinsi']?>'">
                                        Edit
                                </button>
                                <button class="mb-5 px-4 py-2 bg-red-500 text-white rounded-md" title="Hapus <?= $prov['nama_provinsi'] ?>"
                                        onclick="return confirm('Apakah yakin ingin menghapus?') ? location.href='<?= base_url(); ?>provinsi/hapusProv/<?= $prov['id_provinsi']?>' : ''">
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
                        <li><a class="cursor-pointer relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-gray-900 border-r-0 ml-0 rounded-l hover:bg-gray-200" href="<?= base_url('/provinsi/index/1')?>">Pertama</a></li>
                        <li><a class="cursor-pointer relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-gray-900 border-r-0 hover:bg-gray-200" href="<?= base_url('/provinsi/index/'.$sebelumnya)?>">&laquo;</a></li>
                    <?php endif; ?>

                    <!-- Navigasi Angka -->
                    <?php for($i=1; $i<=$total_halaman; $i++): 
                         $halaman_aktif = $halaman == $i ? 'bg-gray-900 text-white hover:bg-gray-800 border-gray-900' : 'text-gray-900' ?>
                        <li><a class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 border-r-0 hover:bg-gray-200 <?= $halaman_aktif ?>" href="<?= base_url('/provinsi/index/'.$i)?>"><?= $i ?></a></li>
                    <?php endfor; ?>

                    <!-- Navigasi Kanan -->
                    <?php if($halaman == $total_halaman): ?>
                        <li><span class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-gray-400 border-r-0 disabled">&raquo;</span></li>
                        <li><span class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-gray-400 rounded-r disabled">Akhir</span></li>
                    <?php else : ?>
                        <li><a class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-gray-900 border-r-0 hover:bg-gray-200" href="<?= base_url('/provinsi/index/'.$berikutnya)?>">&raquo;</a></li>
                        <li><a class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-gray-900 rounded-r hover:bg-gray-200" href="<?= base_url('/provinsi/index/'.$total_halaman)?>">Akhir</a></li>
                    <?php endif;?>

                </ul>
            </nav>
        </div>
    <?php endif;?>
</section>
                        
