<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mikehaertl\wkhtmlto\Pdf;
class PDFController extends Controller
{
    public function preview()
    {
        return view('chart');
    }

    public function download()
    {
        $render = view('chart')->render();

        $pdf = new Pdf;
        $pdf->addPage($render);
        $pdf->setOptions(['javascript-delay' => 5000]);
        if (!$pdf->saveAs(public_path('report.pdf'))){
            return $pdf->getError();
        }else{
            return response()->download(public_path('/pdfs/report.pdf'));
        }



    }
}
