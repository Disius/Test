<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function deteccion_pdf(){
        $pdf = app('dompdf.wrapper');
        $content = $pdf->loadView('PDF.DeteccionNecesidades')
            ->setPaper('a4', 'portrait')
            ->output();
        Storage::disk('local')->put('deteccion.pdf', $content);

        return Storage::download('deteccion.pdf');
    }
}
