<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //


   public function __construct()
   {
   	$this->middleware('guest');
   }

   public function generar()
   {
   	return view('reporte');
   }
}
