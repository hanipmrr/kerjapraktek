<section style="background-image: url(<?= base_url('assets/img/bg/bg6.jpg');?>)">  
    <div class="row" >
        <div class="col-lg-12 text-center ">
        <h2 class="section-heading" style="color:white">Edit Daerah</h2>
        </div>   
        <button type="button" class="btn btn-ButtonRound py-2 px-6 bg-gray-50 rounded-md"> <a href="<?= base_url(); ?>daerah/index/<?= $post[0]->id_provinsi?>"><i class="previous">&laquo;</i> Kembali </a></button>      
    </div>

    <div class="section-inner">
        <div class="container">
            <div class="formAddUpdate">
                <form action="<?= base_url() ?>Daerah/prosesupdateDaerah/<?= $id_daerah?>/<?= $post[0]->id_provinsi ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="kode_daerah" class="nAddUpdate">Kode Daerah</label>
                        <input type="text" class="form-control" name="kode_daerah" id="kode_daerah" placeholder="Ex: A1B1 (A1= Kode Provinsi)" value="<?= $post[0]->kode_daerah?>"></input>
                        <label for="nama_daerah" class="nAddUpdate">Nama Daerah</label>
                        <input type="text" class="form-control" name="nama_daerah" id="nama_daerah" placeholder="Masukan Nama Daerah" value="<?= $post[0]->nama_daerah?>"></input>
                        <label for="gambar" class="nAddUpdate">Gambar (.png)</label>
                        <input type="file" class="form-gambar" id="logo_daerah" name="logo_daerah" value="<?= $post[0]->logo_daerah?>"></input>
                        <input type="hidden"  id="id_daerah" name="id_daerah" value="<?= $post[0]->id_daerah ?>">
                    </div>
                    <button type="submit" class="btn btn-tAddUpdate">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>