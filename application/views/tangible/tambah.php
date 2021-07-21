<section style="background-image: url(<?= base_url('assets/img/bg/bg6.jpg');?>)">  
  <div class="row" >
    <div class="col-lg-12 text-center ">
      <h2 class="section-heading" style="color:white">Tambah Tangible</h2>
    </div>  
      <button type="button" class="btn btn-ButtonRound py-2 px-6 bg-gray-50 rounded-md"> 
          <a href="<?= base_url(); ?>tangible/index/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $id_tipe ?>/<?= $id_provinsi ?>">
              <i class="previous">&laquo;</i> 
              Kembali 
          </a>
      </button> 
  </div>

    <div class="section-inner">
      <div class="container">
          <div class="formAddUpdate">    
              <form action="<?= base_url() ?>Tangible/prosesTambahTangible/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $id_tipe?>/<?= $id_provinsi ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="id_tipe" name="id_tipe" value="<?= $id_tipe?> ">
                <input type="hidden" id="id_provinsi" name="id_provinsi" value="<?= $id_provinsi?> ">
                <div class="form-group">
                  <label for="nama_tangible" class="nAddUpdate">Nama Tangible</label>
                  <input type ="text" class="form-control" name="nama_tangible" id="nama_tangible"  placeholder="Masukan Nama Tangible" required></input>
                  <label for="gambar" class="nAddUpdate">Gambar (.png)</label>
                  <input type="file" class="form-gambar" id="logo_tangible" name="logo_tangible" required>
                </div>
                <button type="submit" class="btn btn-tAddUpdate">Tambah</button>
              </form> 
        </div>      
      </div>
    </div>
</section>