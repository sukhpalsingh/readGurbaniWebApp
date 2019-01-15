<?php

namespace App\Http\Controllers;

use App\SundarGutkaScripture;
use Illuminate\Http\Request;

class SundarGutkaShabadController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $shabadId)
    {
        $scriptures = SundarGutkaScripture::where('sundar_gutka_id', $id)
            ->where('shabad_id', $shabadId)->get();

        $prevShabad = SundarGutkaScripture::where('sundar_gutka_id', $id)
            ->where('shabad_id', '<', $shabadId)
            ->orderBy('shabad_id', 'desc')
            ->first();

        $nextShabad = SundarGutkaScripture::where('sundar_gutka_id', $id)
            ->where('shabad_id', '>', $shabadId)
            ->orderBy('shabad_id', 'asc')
            ->first();

        return view(
            'sundar-gutka.shabads.show',
            [
                'id' => $id,
                'scriptures' => $scriptures,
                'prevShabad' => $prevShabad,
                'nextShabad' => $nextShabad,
            ]
        );
    }
}
