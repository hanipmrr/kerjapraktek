<!DOCTYPE html>
<html lang="en">
<head>
<title>Export Data PDF</title>

<style type="text/css">
.table1 {
    color: #444;
    border-collapse: collapse;
    border: 1px solid #000000;
	margin-left: auto;
	margin-right: auto;
	width: 100%;
	margin-left: 2em;

	& > tbody {
		width: 100%;
	}
}
 
.table1 tr th{
    font-weight: normal;
	border: 1px solid #000000
}
 
.table1, th, td {
    padding: 8px 20px;
    text-align: left;
	border: 1px solid #000000
}
 
.table1 tr:hover {
    background-color: #f5f5f5;
}
 
.table1 tr:nth-child(even) {
    background-color: #f2f2f2;
}
.table1 tr:nth-child(odd) {
    background-color: #d5dfdd;
}

table tr td:first-child  {
	color: rgb(19, 18, 18);
	table-layout: auto;
	width: 150px;
}
</style>
</head>
<body>

<section>
	<?php if(isset($exportpdf)) : ?>
	<?php foreach ($exportpdf as $obj) : ?> 
	<?php endforeach; ?>
	<?php endif; ?> 
    <div>
        <div class="section-inner" style="padding-bottom: 0px!important">
            <div class="container">
                <div class="row">
                    <div id="main-sidebar" class="col-md-6 divider-wrapperPost wow fadeInRight">
                        <h4 style="text-align:center"><strong>Data Objek</strong></h4>
                        <div class="row">
                            <table class="table1">                                
                                <tr>
                                    <td><strong>Kode Objek</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $obj['kode_post_tangible']; ?></p></td>
                                </tr>                                   
								<tr>
                                    <td><strong>Gambar</strong></td>
                                    <td><img src="<?php echo base_url('logo/objek/'.$obj['logo_post_tangible'])?>" style="width:4cm;height:5cm;" ></td>                                    
                                </tr>     
								<tr>
                                    <td><strong>Nama Objek</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $obj['nama_post_tangible']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><strong>Alamat Objek</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $obj['alamat_post_tangible']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><strong>Nomor Regnas</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $obj['no_regnas_post_tangible']; ?></p></td>
                                </tr>                      
                                <tr>
                                    <td><strong>Jenis Objek</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $obj['jenis_post_tangible']; ?></p></td>
                                </tr>   
								<tr>
                                    <td><strong>Detail Objek</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $obj['detail_post_tangible']; ?></p></td>
                                </tr> 
								<tr>
                                    <td><strong>Sejarah Objek</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $obj['sejarah_post_tangible']; ?></p></td>
                                </tr>                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>   


</body>
</html>
                   