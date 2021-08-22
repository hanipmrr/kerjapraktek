<section style="background-image: url(<?= base_url('assets/img/bg/bg6.jpg');?>)">  
    <div class="col-lg-12 text-center">
        <h2 class="text-4xl pt-10" style="color:white">Edit Provinsi</h2>
    </div>

    <div class="w-full mt-10 pb-56">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="flex flex-col mb-10">
                <div class="flex justify-end">
                    <button type="button" class="py-2 px-5 bg-gray-50 rounded-md"
                            onClick="return location.href='<?= base_url('provinsi') ?>'"> 
                            <i class="previous">&laquo;</i>
                            Kembali 
                    </button>
                </div>
            </div>

            <div class="bg-gray-100 p-5 text-gray-700 border-2 border-green-600 shadow rounded-md">
              
                <form action="<?= base_url()?>Provinsi/prosesTambahProvinsi" enctype="multipart/form-data" method="POST">
                    <div class="flex flex-col">
                        <label for="kode_provinsi" class="text-gray-700 font-medium">Kode Provinsi</label>
                        <input type="text" class="w-full focus:ring-emerald-500 focus:border-green-300 rounded-md border border-gray-300 shadow" name="kode_provinsi" id="kode_provinsi" placeholder="Ex: A1"></input>
                        
                        <label for="nama_provinsi" class="text-gray-700 font-medium mt-3">Nama Provinsi</label>
                        <input type="text" class="w-full focus:ring-emerald-500 focus:border-green-300 rounded-md border border-gray-300 shadow" name="nama_provinsi" id="nama_provinsi" placeholder="Ex: Jawa Barat"></input>
                        
                        <div class="flex justify-between items-center mt-3">
                            <label for="gambar" class="text-gray-700 font-medium">Gambar (.png)</label>
                            <label class="text-sm text-red-500 uppercase font-medium">max 2Mb</label>
                        </div>
                        <input type="file" class="focus:ring-green-500 focus:border-green-500 block w-full focus:ring-emerald-500 focus:border-green-300 shadow-sm sm:text-sm border-gray-300 rounded-md bg-white py-2 px-4" id="logo_provinsi" name="logo_provinsi">  
                    </div>

                    <button type="submit" class="w-full py-2 bg-green-800 mt-5 uppercase text-white font-bold rounded-md hover:bg-green-600">TAMBAH</button>

                </form>

            </div>
        </div>
    </div>
</section>

