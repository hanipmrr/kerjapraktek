<section style="background-image: url(<?= base_url('assets/img/bg/bg6.jpg');?>)">  
    <div class="row">
        <div class="col-lg-12 text-center ">
        <h2 class="section-heading" style="color:white">Edit Tipe</h2>
        </div>   
        <button type="button" class="btn btn-ButtonRound py-2 px-6 bg-gray-50 rounded-md"> 
            <a href="<?= base_url(); ?>tangible/index/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $id_tipe ?>">
                <i class="previous">&laquo;</i> 
                Kembali 
            </a>
        </button>      
    </div>

    <div class="section-inner">
        <div class="container">
            <div class="formAddUpdate">
                <form action="<?= base_url() ?>Tangible/prosesupdatetangible/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $id_tipe ?>/<?= $id_tangible?>" 
                      method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_tangible" class="nAddUpdate">Nama Tangible</label>
                        <input type="text" class="form-control" name="nama_tangible" id="nama_tangible" placeholder="Masukan Nama Tangible" value="<?= $post[0]->nama_tangible?>"></input>
                        <label for="gambar" class="nAddUpdate">Gambar (.png)</label>
                        <input type="file" class="form-gambar" id="logo_tangible" name="logo_tangible" value="<?= $post[0]->logo_tangible?>"></input>
                        <input type="hidden"  id="id_tangible" name="id_tangible" value="<?= $id_tangible ?>">
                    </div>
                    <button type="submit" class="btn btn-tAddUpdate">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>