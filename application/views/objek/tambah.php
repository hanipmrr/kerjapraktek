<section style="background-image: url(<?= base_url('assets/img/bg/bg6.jpg');?>)">  
  <div class="row" >

    <div class="col-lg-12 text-center ">
      <h2 class="section-heading" style="color:white">Tambah Objek</h2>
    </div>

    <button type="button" class="btn btn-ButtonRound py-2 px-6 bg-gray-50 rounded-md"> 
      <a href="<?= base_url(); ?>objek/index/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$id_provinsi ?>">
        <i class="previous">&laquo;</i> 
        Kembali 
      </a>
    </button> 

  </div>

  <div class="section-inner">
    <div class="container">
        <div class="formAddUpdate">    
            <!-- 
              $id_prov, 
              $id_daerah, 
              $id_tipe,
              $id_tangible
            -->
            <form method="POST" 
                  enctype="multipart/form-data"
                  action="<?= base_url() ?>objek/prosesTambahObjek/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$id_provinsi ?>">
              <input type="hidden" id="id_tangible" name="id_tangible" value="<?= $id_tangible ?>">
              <input type="hidden" id="id_provinsi" name="id_provinsi" value="<?= $id_provinsi ?>">

              <div class="form-group">
                
                <!-- KODE OBJ -->
                <label for="kode_daerah" class="nAddUpdate">Kode Objek</label>
                <input id="kode_post_tangible"
                       type="text" 
                       class="form-control" 
                       name="kode_post_tangible" 
                       placeholder="Ex: 101 (1= Kode Provinsi)" 
                       required/>
                
                <!-- NAMA OBJ -->
                <label for="nama_tangible" class="nAddUpdate">Nama Objek</label>
                <input id="nama_post_tangible" 
                       type ="text" 
                       class="form-control" 
                       name="nama_post_tangible" 
                       placeholder="Masukan Nama Objek" 
                       required/>
                
                <!-- ALAMAT OBJ -->
                <label for="kode_daerah" class="nAddUpdate">Alamat Objek</label>
                <input id="alamat_post_tangible"
                       type="text" 
                       class="form-control" 
                       name="alamat_post_tangible" 
                       placeholder="Masukan Alamat Objek" 
                       required/>
                
                <!-- DETAIL OBJ -->
                <label for="nama_tangible" class="nAddUpdate">Detail Objek</label>
                <textarea id="detail_post_tangible"
                          type ="text" 
                          class="form-control" 
                          name="detail_post_tangible"  
                          placeholder="Masukan Detail Objek" 
                          required></textarea>
                
                <!-- SEJARAH OBJ -->
                <label for="kode_daerah" class="nAddUpdate">Sejarah Objek</label>
                <textarea id="sejarah_post_tangible"
                          type="text" 
                          class="form-control" 
                          name="sejarah_post_tangible" 
                          placeholder="Masukan Sejarah Objek" 
                          required></textarea>
                
                <!-- NO REGNAS OBJ -->
                <label for="nama_tangible" class="nAddUpdate">No Regnas Objek</label>
                <input id="no_regnas_post_tangible"
                       type ="text" 
                       class="form-control" 
                       name="no_regnas_post_tangible" 
                       placeholder="Masukan Nomor Regnas Objek" 
                       required/>
                
                <!-- JENIS TIPE OBJ -->
                <label for="kode_daerah" class="nAddUpdate">Jenis Tipe Objek</label>
                <select type="text" class="form-control" name="jenis_post_tangible" id="jenis_post_tangible" required>
                <option value="">--Pilih Jenis--</option>
                  <option value="Bangunan">Bangunan</option>
                  <option value="Benda">Benda</option>
                  <option value="Struktur">Struktur</option>
                  <option value="Situs">Situs</option>
                  <option value="Kawasan">Kawasan</option>
                </select>
                
                <!-- GAMBAR OBJ -->
                <label for="gambar" class="nAddUpdate">Gambar (.png)</label>
                <input type="file" class="form-gambar" id="logo_post_tangible" name="logo_post_tangible" required>

              </div>
              <button type="submit" class="btn btn-tAddUpdate">Tambah</button>
            </form> 
      </div>      
    </div>
  </div>
</section>