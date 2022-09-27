<?php

namespace App\Controller;

use Dompdf\Dompdf;

class wo
{


    public function html_to_pdf($file_path)
    {

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml(file_get_contents($file_path));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream();
    }
    // public function html2pdf(string $html)
    public function html2pdf(string $html)
    {

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}