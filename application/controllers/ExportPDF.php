<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
use Dompdf\Options;

class ExportPDF extends CI_Controller {

    public function __construct()
    {  
        parent::__construct();
        $this->load->model('Objek_model');
    
    }
    public function export($id)
	{
        $data['judul'] = "Export PDF";
        $data['exportpdf'] = $this->Objek_model->getObjekPostById($id);
        $data['id_post_tangible'] = $id;

		$html = $this->load->view('pdf/pdf_view',$data,TRUE);
        
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portarit');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('document',['Attachment'=>false]);
        
	}
}
?>