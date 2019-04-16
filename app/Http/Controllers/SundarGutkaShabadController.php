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
    public function show($id, $serial)
    {
        $scriptures = SundarGutkaScripture::where('sundar_gutka_id', $id)
            ->where('serial', $serial)->get();

        $prevShabad = SundarGutkaScripture::where('sundar_gutka_id', $id)
            ->where('serial', '<', $serial)
            ->orderBy('serial', 'desc')
            ->first();

        $nextShabad = SundarGutkaScripture::where('sundar_gutka_id', $id)
            ->where('serial', '>', $serial)
            ->orderBy('serial', 'asc')
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
