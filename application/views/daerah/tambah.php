<section style="background-image: url(<?= base_url('assets/img/bg/bg6.jpg');?>)">  
  <div class="row" >
    <div class="col-lg-12 text-center ">
      <h2 class="section-heading" style="color:white">Tambah Daerah</h2>
    </div>  
    <button type="button" class="btn btn-ButtonRound py-2 px-6 bg-gray-50 rounded-md"> <a href="<?= base_url(); ?>daerah/index/<?= $id?>"><i class="previous">&laquo;</i> Kembali </a></button>     

  </div>

    <div class="section-inner">
      <div class="container">
          <div class="formAddUpdate">    
              <form action="<?= base_url() ?>Daerah/prosesTambahDaerah/<?= $id?> "method="POST" enctype="multipart/form-data">
                <input type="hidden" id="id_provinsi" name="id_provinsi" value="<?=$id?>">
                <div class="form-group">
                  <label for="kode_daerah" class="nAddUpdate">Kode Daerah</label>
                  <input type="text" class="form-control" name="kode_daerah" id="kode_daerah" placeholder="Ex: A1B1 (A1= Kode Provinsi)"></input>
                  <label for="nama_daerah" class="nAddUpdate">Nama Daerah</label>
                  <input type ="text" class="form-control" name="nama_daerah" id="nama_daerah"  placeholder="Masukan Nama Daerah" required></input>
                  <label for="gambar" class="nAddUpdate">Gambar (.png)</label>
                  <input type="file" class="form-gambar" id="logo_daerah" name="logo_daerah" required>
                </div>
                <button type="submit" class="btn btn-tAddUpdate">Tambah</button>
              </form> 
        </div>      
      </div>
    </div>
</section>