<?php

namespace App\Http\Controllers;

use App\GurbaniRaag;
use App\GurbaniSource;
use App\GurbaniScripture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PothiSectionController extends Controller
{
    public function index($identifier)
    {
        $gurbaniSource = GurbaniSource::where('identifier', $identifier)->first();
        $raags = GurbaniRaag::with([
                'gurbaniSource' => function($query) use ($identifier) {
                    $query->where('identifier', $identifier);
                }
            ])
            ->orderBy('id')
            ->get();
        return view('pothis.sections.index', ['raags' => $raags, 'gurbaniSource' => $gurbaniSource]);
    }

    public function show($identifier, $raagId)
    {
        $gurbaniSource = GurbaniSource::where('identifier', $identifier)->first();
        $raag = GurbaniRaag::where('id', $raagId)->first();
        $scriptures = GurbaniScripture::where('gurbani_raag_id', $raagId)
            ->whereIn(
                'id',
                GurbaniScripture::where('gurbani_raag_id', $raagId)
                    ->whereNotNull('gurbani_writer_id')
                    ->groupBy('shabad_id')
                    ->select(DB::raw('min(id)'))
                    ->get()
            )
            ->orderBy('gurbani_writer_id', 'asc')
            ->orderBy('shabad_id', 'asc')
            ->get();
        return view('pothis.sections.show', ['scriptures' => $scriptures, 'gurbaniSource' => $gurbaniSource, 'raag' => $raag]);
    }
}
