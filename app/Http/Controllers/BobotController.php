<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    public function index(): View
    {
        return view('bobot');
    }
}