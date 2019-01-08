<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class ShabadController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('shabads.show', ['id' => $id]);
    }
}
