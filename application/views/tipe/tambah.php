<section style="background-image: url(<?= base_url('assets/img/bg/bg6.jpg');?>)">   
  <div class="row" >
    <div class="col-lg-12 text-center ">
      <h2 class="section-heading" style="color:white">Tambah Tipe</h2>
    </div>  
    <button type="button" class="btn btn-ButtonRound py-2 px-6 bg-gray-50 rounded-md"> <a href="<?= base_url(); ?>tipe/index/<?= $id_prov?>/<?= $id_daerah?>/<?= $id_provinsi?>"><i class="previous">&laquo;</i> Kembali </a></button> 
  </div>

    <div class="section-inner">
      <div class="container">
          <div class="formAddUpdate">    
              <form action="<?= base_url() ?>Tipe/prosesTambahTipe/<?= $id_prov ?>/<?= $id_daerah?>/<?= $id_provinsi?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="id_daerah" name="id_daerah" value="<?= $id_daerah ?>">
                <input type="hidden" id="id_provinsi" name="id_provinsi" value="<?= $id_provinsi ?>">
                <div class="form-group">               
                  <label for="nama_tipe" class="nAddUpdate">Nama Tipe</label>
                  <input type ="text" class="form-control" name="nama_tipe" id="nama_tipe"  placeholder="Masukan Nama Tipe"></input>
                  <label for="gambar" class="nAddUpdate">Gambar (.png)</label>
                  <input type="file" class="form-gambar" id="logo_tipe" name="logo_tipe" required>
                </div>
                <button type="submit" class="btn btn-tAddUpdate">Tambah</button>
              </form> 
        </div>      
      </div>
    </div>
</section>