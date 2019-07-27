<?php

namespace App\Http\Controllers;

use App\DiskAlbum;
use Illuminate\Http\Request;
use App\DiskCategory;
use App\DiskGenre;

class AlbumManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = DiskAlbum::paginate(20);
        return view(
            'dashboard.album-manager.index',
            [
                'tab' => 'disk-manager',
                'albums' => $albums
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastSerial = DiskAlbum::orderBy('serial')->first();

        $diskAlbum = new DiskAlbum();
        $diskAlbum->serial = empty($lastSerial) ? 1: ($lastSerial->serial + 1);
        $diskAlbum->category_id = 2;
        $diskAlbum->genre_id = 2;

        return view(
            'dashboard.album-manager.form',
            [
                'tab' => 'albums',
                'categories' => DiskCategory::get(),
                'genres' => DiskGenre::get(),
                'diskAlbum' => $diskAlbum
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $diskAlbum = DiskAlbum::create(
            $request->only([
                'name_pan',
                'name_eng',
                'disk_category_id',
                'disk_genre_id',
                'serial',
            ])
        );

        return redirect('/dashboard/albums-manager/' . $diskAlbum->id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view(
            'dashboard.album-manager.form',
            [
                'tab' => 'albums',
                'categories' => DiskCategory::get(),
                'genres' => DiskGenre::get(),
                'diskAlbum' => DiskAlbum::find($id)
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $diskAlbum = DiskAlbum::find($id);
        $diskAlbum->update(
            $request->only([
                'name_pan',
                'name_eng',
                'disk_category_id',
                'disk_genre_id',
                'serial',
            ])
        );

        return redirect('/dashboard/albums-manager/' . $diskAlbum->id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
