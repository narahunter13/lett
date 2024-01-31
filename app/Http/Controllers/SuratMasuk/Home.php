<?php

namespace App\Http\Controllers\SuratMasuk;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(): View
    {
        return view('surat-masuk/index');
    }
}
