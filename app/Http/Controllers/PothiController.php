<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class PothiController extends Controller
{
    public function index()
    {
        return view('pothis.index');
    }
}
