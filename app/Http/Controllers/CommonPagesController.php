<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonPagesController extends Controller
{
    // Faq
    public function Faq(){
        return view('common.faq');
    }

    // Terms & Condition

    public function Term(){
        return view('common.termsCondition');
    }

    public function Privacy(){
        return view('common.privacy');
    }


}
