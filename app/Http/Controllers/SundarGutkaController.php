<?php

namespace App\Http\Controllers;

use App\SundarGutka;
use Illuminate\Http\Request;

class SundarGutkaController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baanis = SundarGutka::get();
        return view('sundar-gutka.index', ['baanis' => $baanis]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('sundar-gutka.show', ['id' => $id]);
    }
}
