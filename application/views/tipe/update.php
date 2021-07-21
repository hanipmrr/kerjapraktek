<section style="background-image: url(<?= base_url('assets/img/bg/bg6.jpg');?>)">  
    <div class="row" >
        <div class="col-lg-12 text-center ">
        <h2 class="section-heading" style="color:white">Edit Tipe</h2>
        </div>   
        <button type="button" class="btn btn-ButtonRound py-2 px-6 bg-gray-50 rounded-md"> <a href="<?= base_url(); ?>tipe/index/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $id_provinsi ?>"><i class="previous">&laquo;</i> Kembali </a></button>      
    </div>

    <div class="section-inner">
        <div class="container">
            <div class="formAddUpdate">
                <form action="<?= base_url() ?>tipe/prosesupdatetipe/<?= $id_prov ?>/<?= $id_daerah ?>/<?= $id_tipe?>/<?= $id_provinsi ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_tipe" class="nAddUpdate">Nama Tipe</label>
                        <input type="text" class="form-control" name="nama_tipe" id="nama_tipe" placeholder="Masukan Nama Tipe" value="<?= $post[0]->nama_tipe?>"></input>
                        <label for="gambar" class="nAddUpdate">Gambar (.png)</label>
                        <input type="file" class="form-gambar" id="logo_tipe" name="logo_tipe" value="<?= $post[0]->logo_tipe ?>"></input>
                        <input type="hidden"  id="id_tipe" name="id_tipe" value="<?= $post[0]->id_tipe ?>">
                    </div>
                    <button type="submit" class="btn btn-tAddUpdate">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>