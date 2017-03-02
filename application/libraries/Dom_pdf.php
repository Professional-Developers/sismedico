<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dom_pdf {
    
    public function __construct() {
        require_once('dompdf/dompdf_config.inc.php');
    }

    function pdf_create($nombre, $html, $filename = '', $tamanio, $orientacion, $stream = TRUE) {
        if (isset($html)) {
            $html = stripslashes($html);
            $dompdf = new DOMPDF();
            $dompdf->load_html($html);
            $dompdf->set_paper($tamanio, $orientacion);
            $dompdf->render();
            if ($stream) {
                $dompdf->stream($filename.".pdf");
                //$pdf = $dompdf->output();
                //file_put_contents("uploads/TRAMINT/PDFS/" . $nombre . ".pdf", $pdf);para que se guarde el archivo
            } else {
            	return $dompdf->output();
                //$pdf = $dompdf->output();
            }
        }
    }
    function pdf_create_licencias($html, $filename = '', $name, $stream = TRUE, $tamanio = "A4", $orientacion = "portrait") {
//        require_once("dompdf/dompdf_config.inc.php");
        if (isset($html)) {
            $html = stripslashes($html);
            $dompdf = new DOMPDF();
            $dompdf->load_html($html);
            $dompdf->set_paper($tamanio, $orientacion);
            $dompdf->render();
            if ($stream) {
//                $dompdf->stream($name . ".pdf");
                $pdf = $dompdf->output();
                file_put_contents("uploads/" . $filename . ".pdf", $pdf);
//                return $dompdf->output();
            }
        }
    }
    function pdf_create_licenciasX($html, $filename = '', $name, $stream = TRUE, $tamanio = "A4", $orientacion = "portrait") {
        if (isset($html)) {
            $html = stripslashes($html);
            $dompdf = new DOMPDF();
            $dompdf->set_paper($tamanio, $orientacion);
            $dompdf->load_html($html);
            $dompdf->render();
            if ($stream) {
                $dompdf->stream($name . ".pdf");
                $pdf = $dompdf->output();
                file_put_contents("uploads/" . $filename . ".pdf", $pdf);
                return $dompdf->output();
            }
        }
    }

    function pdf_create_licencias2($html, $filename='', $name, $stream=TRUE, $tamanio="A4", $orientacion="landscape") {
        require_once("dompdf/dompdf_config.inc.php");
        if (isset($html)){
            $html = stripslashes($html);
            $dompdf = new DOMPDF();
            $dompdf->set_paper($tamanio,$orientacion);
            $dompdf->load_html($html);
            $dompdf->render();
            if($stream){
                $dompdf->stream($name.".pdf");
                $pdf = $dompdf->output();
                file_put_contents("uploads/".$filename.".pdf", $pdf);
                return $dompdf->output();
            }
        }
    }
    
    function pdf_create_licencias3($html, $filename='', $name, $stream=TRUE, $tamanio="A4", $orientacion="landscape") {
        require_once("dompdf/dompdf_config.inc.php");
        if (isset($html)){
            $html = stripslashes($html);
            $dompdf = new DOMPDF();
            $dompdf->set_paper($tamanio,$orientacion);
            $dompdf->load_html($html);
            $dompdf->render();
            if($stream){
                //$dompdf->Image(URL_IMG.'sigma/municipio.png',10,8,33); //Logo

                $dompdf->stream($name.".pdf");
                $pdf = $dompdf->output();
                //$pdf->page_text(72, 18, "Header: of ", $font, 6, array(0,0,0));
                file_put_contents("uploads/".$filename.".pdf", $pdf);
                return $dompdf->output();
            }
        }
    }


}

?>