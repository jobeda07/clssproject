<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class backandcontroller extends Controller
{
    public function dashboardsecond(){
        return view ('backendsecond.main');
    }
    public function test(){
        return view('backendsecond.pages.partial.body');
    }
}
