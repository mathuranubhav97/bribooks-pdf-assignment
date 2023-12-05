<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    public function generatePdf($title = 'Lorem Ipsum')
    {
        $pdf = App::make('dompdf.wrapper');

        $coverPage = view('pdf.cover-page', ['title' => $title])->render();
        $content = view('pdf.content')->render();
        $backcoverPage = view('pdf.back-cover', ['title' => $title, 'author' => 'Sam Wit'])->render();

        $html = $coverPage . $content . $backcoverPage;

        $pdf->loadHtml($html);

        return $pdf->stream();
    }
}
