<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class ReadController extends Controller
{
    public function index()
    {
        return view('read.index');
    }
}
