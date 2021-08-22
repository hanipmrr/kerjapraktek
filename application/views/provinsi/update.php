<section style="background-image: url(<?= base_url('assets/img/bg/bg6.jpg');?>)">  
    
    <div class="col-lg-12 text-center">
        <h2 class="text-4xl pt-10" style="color:white">Edit Provinsi</h2>
    </div>

    <div class="w-full mt-10 pb-40">
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

            <div class="formAddUpdate">
                
                <?php foreach ($post as $prov) : ?>
                <form action="<?= base_url()?>Provinsi/prosesUpdateProvinsi/<?=$prov['id_provinsi']?>" enctype="multipart/form-data" method="POST">
                    
                    <div class="form-group">
                        <label for="kode_provinsi" class="nAddUpdate">Kode Provinsi</label>
                        <input type="text" class="form-control" name="kode_provinsi" id="kode_provinsi" placeholder="Ex: A1" ></input>
                        <label for="nama_provinsi" class="nAddUpdate">Nama Provinsi</label>
                        <input type="text" class="form-control" name="nama_provinsi" id="nama_provinsi" placeholder="Masukan Nama Provinsi"></input>
                        <label for="gambar"class="nAddUpdate">Gambar (.png)</label>
                        <input type="file" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-white py-2 px-4" id="logo_provinsi" name="logo_provinsi" >  
                        <input type="hidden" id="id_provinsi" name="id_provinsi" value="<?= $prov['id_provinsi'] ?>">
                    </div>

                    <button type="submit" class="w-full py-2 bg-yellow-400 mt-5 uppercase text-gray-900 rounded-md hover:bg-yellow-300">Update</button>
                    
                </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


