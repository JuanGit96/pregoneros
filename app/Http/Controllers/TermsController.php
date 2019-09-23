<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TermsController extends Controller
{
//    public function downloadManageDataPersonalInformationPdf()
//    {
//        $file = public_path()."/terms/MANEJO_Y_PROTECCION_DE_DATOS_E_INFORMACIÓN_PERSONAL.pdf";
//        $headers = array('Content-Type: application/pdf',);
//        return Response::download($file, 'info.pdf',$headers);
//    }
//
//    public function viewManageDataPersonalInformationPdf()
//    {
//        $filename = "MANEJO_Y_PROTECCION_DE_DATOS_E_INFORMACIÓN_PERSONAL.pdf";
//
//        $path = public_path()."/terms/MANEJO_Y_PROTECCION_DE_DATOS_E_INFORMACIÓN_PERSONAL.pdf";
//
//        $headers = array('Content-Type: application/pdf',);
//
//
////        return Response::make(file_get_contents($path), 200, [
////            'Content-Type' => 'application/pdf', //Change according to the your file type
////            'Content-Disposition' => 'inline; filename="'.$filename.'"'
////        ]);
//
//        return Response::download($path, $filename,$headers);
//
//
//
//    }
}
