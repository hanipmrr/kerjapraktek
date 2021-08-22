<section style="background-image: url(<?= base_url('assets/img/bg/bg6.jpg');?>)">   
    <div class="col-lg-12 text-center">
        <h2 class="text-4xl pt-10" style="color:white">Tambah Tangible</h2>
    </div>

    <div class="w-full mt-10 pb-56">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            
            <div class="flex flex-col mb-10">
                <div class="flex justify-end">
                <button type="button" class="btn btn-ButtonRound py-2 px-6 bg-gray-50 rounded-md"> 
                  <a href="<?= base_url(); ?>tangible/index/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $id_tipe ?> ?>">
                  <i class="previous">&laquo;</i> 
                  Kembali 
                  </a>
                </button> 
                </div>
            </div>

            <div class="formAddUpdate">    
            <form action="<?= base_url() ?>Tangible/prosesTambahTangible/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $id_tipe?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="id_tipe" name="id_tipe" value="<?=$id_tipe?> ">
                <input type="hidden" id="id_provinsi" name="id_provinsi" value="<?=$id_prov?> ">
                    <div class="form-group">               
                    <label for="nama_tangible" class="nAddUpdate">Nama Tangible</label>
                    <input type ="text" class="form-control" name="nama_tangible" id="nama_tangible"  placeholder="Masukan Nama Tangible" required></input>
                    <label for="gambar" class="nAddUpdate">Gambar (.png / max: 2mb)</label>
                    <input type="file" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-white py-2 px-4" id="logo_tangible" name="logo_tangible" required>
                    </div>

                    <button type="submit" class="w-full py-2 bg-green-500 mt-5 uppercase text-white font-bold rounded-md hover:bg-green-600">TAMBAH</button>

                </form> 
            </div>      
        </div>
    </div>
</section>