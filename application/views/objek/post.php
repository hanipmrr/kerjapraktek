<section></section>
    
    <div id="headerwrap" class="h-24">
        <div class="container text-center ">
            <?php if(isset($post)) : ?>
                <?php foreach ($post as $objekk) : ?> 
                        <h2 class="section-heading text-6xl" style="color:white"><?= $objekk['nama_post_tangible']; ?></h2>
                <?php endforeach; ?>
            <?php endif; ?> 
        </div>
    </div>

    


    <div class="w-full bg-white py-10">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="flex">
                <button type="button" class="py-2 px-6 bg-gray-200 rounded-md flex items-center"
                        onclick="location.href='<?= base_url(); ?>objek/index/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible?>'"> 
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M15.707 15.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 010 1.414zm-6 0a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 1.414L5.414 10l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                        <span class="ml-2">Kembali</span>
                </button> 
    
                <button class="py-2 px-4 bg-yellow-600 hover:bg-yellow-600 rounded-md text-white flex mx-5"
                        onclick="window.open('<?= base_url(); ?>exportpdf/export/<?= $objekk['id_post_tangible']?>','_blank')">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path></svg>
                        <span class="ml-2">Pdf</span>
                </button>

                <?php if(isset($_SESSION['username'])&&
                                ($_SESSION['id_role']==1 ||
                                $_SESSION['id_provinsi'] == $id_prov) ) 
                : ?>
    
                    <button class="py-2 px-4 bg-yellow-600 hover:bg-yellow-600 rounded-md flex text-white" 
                            onclick="location.href='<?= base_url(); ?>objek/updateObjek/<?= $id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$id_post_tangible.'/'.$objekk['id_post_tangible']?>'">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                            <span class="ml-2">Edit</span>
                    </button>
                <?php endif; ?>

            </div>
            
            <div class="flex flex-col mr-2 justify-center md:justify-between h-full mt-10 md:flex-row">
                <div style="background-image: url(<?= base_url('logo/objek/'.$objekk['logo_post_tangible'])?>)" 
                     class="w-full h-80 rounded-xl bg-gray-100 bg-center bg-cover shadow shadow-lg"></div>

                    <div class="flex flex-col w-full md:ml-10">
                        <div class="bg-gray-50 text-sm text-gray-500 font-bold px-5 py-2 rounded-t-md border border-b-0 border-gray-300 text-center">
                            Data Objek
                        </div>
                        <table class="w-full table1">
                            <tbody class="">
                                <tr class="scale-100 text-xs cursor-default">
                                    <td class="pl-5 pr-3 whitespace-no-wrap border border-gray-300 text-lg">
                                        <div class="text-gray-900">ID Objek</div>
                                    </td>

                                    <td class="px-2 py-2 whitespace-no-wrap border border-gray-300 text-lg">
                                        <div class="leading-5 text-gray-500 font-medium"><?= $objekk['kode_post_tangible']; ?></div>
                                    </td>

                                </tr>
                                <tr class="scale-100 text-xs cursor-default bg-emerald-100">
                                    <td class="pl-5 pr-3 whitespace-no-wrap border border-gray-300 text-lg">
                                        <div class="text-gray-900">Alamat</div>
                                    </td>

                                    <td class="px-2 py-2 whitespace-no-wrap border border-gray-300 text-lg">
                                        <div class="leading-5 text-gray-500 font-medium"><?= $objekk['alamat_post_tangible']; ?></div>
                                    </td>
                                </tr>
                                <tr class="scale-100 text-xs cursor-default">
                                    <td class="pl-5 pr-3 whitespace-no-wrap border border-gray-300 text-lg">
                                        <div class="text-gray-900">Nomor Regnas</div>
                                    </td>

                                    <td class="px-2 py-2 whitespace-no-wrap border border-gray-300 text-lg">
                                        <div class="leading-5 text-gray-500 font-medium"><?= $objekk['no_regnas_post_tangible']; ?></div>
                                    </td>
                                </tr>
                                <tr class="scale-100 text-xs cursor-default">
                                    <td class="pl-5 pr-3 whitespace-no-wrap border border-gray-300 text-lg">
                                        <div class="text-gray-900">Jenis</div>
                                    </td>

                                    <td class="px-2 py-2 whitespace-no-wrap border border-gray-300 text-lg">
                                        <div class="leading-5 text-gray-500 font-medium"><?= $objekk['jenis_post_tangible']; ?></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>


    <div class="w-full bg-emerald-700 py-10 text-white">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="container">
                <div class="h-full pb-5">
                    <div class="col-xs-12 item-caption">
                    <h1 class="text-3xl">Detail:</h1>
                    <p style="text-align: justify" class="text-xl"><?= $objekk['detail_post_tangible']; ?></p>
                    </div>
                </div>
                <div class="h-full border-t border-gray-100 py-5">
                    <h1 class="text-3xl">Sejarah:</h1>
                    <p style="text-align: justify" class="text-xl"><?= $objekk['sejarah_post_tangible']; ?></p>
                </div> 
            </div>
        </div>
    </div>    
</section>                        
                   