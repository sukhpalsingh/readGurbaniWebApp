<?php

namespace App\Http\Controllers;

use App\LessonVideo;
use Illuminate\Http\Request;

class LessonVideoManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $courseId
     * @param int $lessonId
     * @return \Illuminate\Http\Response
     */
    public function index($courseId, $lessonId)
    {
        $lessonVideos = LessonVideo::where('lesson_id', $lessonId)->get();
        return view(
            'lesson-video-manager.index', [
                'courseId' => $courseId,
                'lessonId' => $lessonId,
                'lessonVideos' => $lessonVideos
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($courseId, $lessonId)
    {
        return view('lesson-video-manager.form', ['courseId' => $courseId, 'lessonId' => $lessonId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($courseId, $lessonId, Request $request)
    {
        $data = $request->all();
        $data['lesson_id'] = $lessonId;
        LessonVideo::create($data);
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
    public function edit($courseId, $lessonId, $id)
    {
        $lessonVideo = LessonVideo::find($id);
        return view(
            'lesson-video-manager.form',
            [
                'courseId' => $courseId,
                'lessonId' => $lessonId,
                'lessonVideo' => $lessonVideo
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
    public function update(Request $request, $courseId, $lessonId, $id)
    {
        $lessonVideo = LessonVideo::find($id);
        $lessonVideo->fill($request->all());
        $lessonVideo->save();
        return redirect("training-manager/courses/$courseId/lessons/$lessonId/videos/$id/edit");
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
