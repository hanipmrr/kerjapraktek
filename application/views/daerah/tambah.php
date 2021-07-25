<section style="background-image: url(<?= base_url('assets/img/bg/bg6.jpg');?>)">  
    <div class="col-lg-12 text-center">
        <h2 class="text-4xl pt-10" style="color:white">Edit Provinsi</h2>
    </div>

    <div class="w-full mt-10 pb-10">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            
            <div class="flex flex-col mb-10">
                <div class="flex justify-end">
                    <button type="button" class="py-2 px-5 bg-gray-50 rounded-md"
                            onClick="return location.href='<?= base_url(); ?>daerah/index/<?= $id ?>'"> 
                            <i class="previous">&laquo;</i>
                            Kembali 
                    </button>
                </div>
            </div>

            <div class="formAddUpdate">    
                <form action="<?= base_url() ?>Daerah/prosesTambahDaerah/<?= $id?> "method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id_provinsi" name="id_provinsi" value="<?=$id?>">

                    <div class="form-group">
                        <label for="kode_daerah" class="nAddUpdate">Kode Daerah</label>
                        <input type="text" class="form-control" name="kode_daerah" id="kode_daerah" placeholder="Ex: A1B1 (A1= Kode Provinsi)"></input>
                        <label for="nama_daerah" class="nAddUpdate">Nama Daerah</label>
                        <input type ="text" class="form-control" name="nama_daerah" id="nama_daerah"  placeholder="Masukan Nama Daerah" required></input>
                        <label for="gambar" class="nAddUpdate">Gambar (.png)</label>
                        <input type="file" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-white py-2 px-4" id="logo_daerah" name="logo_daerah" required>
                    </div>
                    
                    <button type="submit" class="w-full py-2 bg-green-500 mt-5 uppercase text-white font-bold rounded-md hover:bg-green-600">TAMBAH</button>

                </form> 
            </div>      
        </div>
    </div>
</section>