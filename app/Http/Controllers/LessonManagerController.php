<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

class LessonManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($courseId)
    {
        $lessons = Lesson::where('course_id', $courseId)->get();
        return view('lesson-manager.index', ['courseId' => $courseId, 'lessons' => $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($courseId)
    {
        return view('lesson-manager.form', ['courseId' => $courseId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($courseId, Request $request)
    {
        $data = $request->all();
        $data['course_id'] = $courseId;
        $lesson = Lesson::create($data);

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
    public function edit($courseId, $id)
    {
        $lesson = Lesson::find($id);
        return view('lesson-manager.form', ['courseId' => $courseId, 'lesson' => $lesson]);
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
        //
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
