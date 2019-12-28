<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GioiThieuController extends Controller
{
    public function gioithieu()
    {
        return view('example.gioithieu');
    }
}
