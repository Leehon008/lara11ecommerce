<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuotationsController extends Controller
{
      public function getQuote(){
        return view('frontend.pages.quotation');
    }
}
