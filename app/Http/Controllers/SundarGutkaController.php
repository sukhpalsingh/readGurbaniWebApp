<?php

namespace App\Http\Controllers;

use App\SundarGutka;
use App\SundarGutkaScripture;
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
        $baaniList = [];
        foreach ($baanis as $baani) {
            $scripture = $baani->scriptures()->first();
            $baaniList[] = [
                'id' => $baani->id,
                'punjabi' => $baani->punjabi,
                'shabad-id' => empty($scripture) ? null : $scripture->shabad_id
            ];
        }

        return view('sundar-gutka.index', ['baanis' => $baaniList]);
    }
}
