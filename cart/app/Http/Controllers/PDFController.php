<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    //​​
    public function pdfReport() {
        $data = [
            'title' => 'Doradoramo Cart',
            'date' => date('m/d/Y')
        ];

        $products=Product::paginate(12);
        $pdf = PDF::loadView('myPDF', compact('products'));

        return $pdf->download('report.pdf');
    }
}

