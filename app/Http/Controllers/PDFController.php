<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
   public function getpdf(Request $request){
    $data = [
        'title' => 'Welcome',
        'date' => date('m/d/y'),
    ];
    $pdf = PDF::loadView('pdfview', $data);
    return $pdf->download('PNPReport.pdf');
   }
}
