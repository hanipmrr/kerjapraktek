<section class="bg-cover bg-center h-full" style="background-image: url(<?= base_url('assets/img/bg/bg6.jpg') ?>)">  

    <div class="col-lg-12 text-center">
        <h2 class="text-4xl pt-10" style="color:white">Edit Objek</h2>
    </div>

    <div class="w-full mt-10 pb-10">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="flex flex-col mb-10">
                <div class="flex justify-end">
                    <button type="button" class="py-2 px-5 bg-gray-50 rounded-md"
                            onClick="return location.href='<?= base_url('objek/index/'.$id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible) ?>'"> 
                            <i class="previous">&laquo;</i>
                            Kembali 
                    </button>
                </div>
            </div>

            <div class="formAddUpdate">
                <form action="<?= base_url() ?>objek/prosesupdateobjek/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$id_post_tangible ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                    
                        <label for="kode_daerah" class="nAddUpdate">Kode Objek</label>
                        <input type="text" class="form-control" name="kode_post_tangible" id="kode_post_tangible" placeholder="Ex: 101 (1= Kode Provinsi)" value="<?= $post[0]->kode_post_tangible?>" required></input>
                        
                        <label for="nama_tangible" class="nAddUpdate">Nama Objek</label>
                        <input type ="text" class="form-control" name="nama_post_tangible" id="nama_post_tangible"  placeholder="Masukan Nama Objek" value="<?= $post[0]->nama_post_tangible?>" required></input>
                        
                        <label for="kode_daerah" class="nAddUpdate">Alamat Objek</label>
                        <input type="text" class="form-control" name="alamat_post_tangible" id="alamat_post_tangible" placeholder="Masukan Alamat Objek" value="<?= $post[0]->alamat_post_tangible?>" required></input>
                       
                        <label for="nama_tangible" class="nAddUpdate">Detail Objek</label>
                        <textarea type ="text" class="form-control" name="detail_post_tangible" id="detail_post_tangible"  placeholder="Masukan Detail Objek"  required><?= $post[0]->detail_post_tangible?></textarea>  
                        
                        <label for="kode_daerah" class="nAddUpdate">Sejarah Objek</label>
                        <textarea type="text" class="form-control" name="sejarah_post_tangible" id="sejarah_post_tangible" placeholder="Masukan Sejarah Objek" required><?= $post[0]->sejarah_post_tangible?> </textarea>                     
                       
                        <label for="nama_tangible" class="nAddUpdate">No Regnas Objek</label>
                        <input type ="text" class="form-control" name="no_regnas_post_tangible" id="no_regnas_post_tangible"  placeholder="Masukan Nomor Regnas Objek" value="<?= $post[0]->no_regnas_post_tangible?>" required></input>
                        
                        <label for="kode_daerah" class="nAddUpdate">Jenis Tipe Objek</label>
                        <select type="text" class="form-control" name="jenis_post_tangible" id="jenis_post_tangible" value="<?= $post[0]->jenis_post_tangible?>" required>
                        <option value="">--Pilih Jenis--</option>
                            <option value="Bangunan">Bangunan</option>
                            <option value="Benda">Benda</option>
                            <option value="Struktur">Struktur</option>
                            <option value="Situs">Situs</option>
                            <option value="Kawasan">Kawasan</option>
                        </select>
                        
                        <label for="gambar" class="nAddUpdate">Gambar Objek (.png)</label>

                        <input type="file" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-white py-2 px-4" id="logo_post_tangible" name="logo_post_tangible" value="<?= $post[0]->logo_post_tangible?>" required>

                        <input type="hidden" id="id_post_tangible" name="id_post_tangible" value="<?= $post[0]->id_post_tangible ?>">
                        
                    </div>
                    <button type="submit" class="w-full py-2 bg-yellow-400 mt-5 uppercase text-gray-900 rounded-md hover:bg-yellow-300">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>