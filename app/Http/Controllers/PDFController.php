<?php

namespace App\Http\Controllers;

use App\Models\DeteccionNecesidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function deteccion_pdf(Request $request){

        $pdf_data = DeteccionNecesidades::with(['carrera', 'deteccion_facilitador'])
            ->where('periodo', '=', $request->input('periodo'))
            ->where('carrera_dirigido', '=', $request->input('carrera'))
            ->whereYear('created_at', '=', $request->input('anio'));

        $pdf = app('dompdf.wrapper');
        $content = $pdf->loadView('pdf.deteccion', array('deteccion' => $pdf_data))
            ->setPaper('a4', 'portrait')
            ->output();
        Storage::disk('local')->put('deteccion.pdf', $content);

        return Storage::download('deteccion.pdf');
    }
}
