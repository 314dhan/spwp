<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class AlternatifController extends Controller
{
    public function index(): View
    {
        return view('kriteria');
    }
}
