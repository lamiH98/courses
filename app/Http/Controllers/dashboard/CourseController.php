<?php

namespace App\Http\Controllers\dashboard;

use App\Course;
use App\Stage;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('dashboard.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stages = Stage::all();
        return view('dashboard.course.create', compact('stages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        if($request->hasFile('course_image')) {
            $uploadImage = $request->file('course_image');
            $nameImage   = time() . '.' . $uploadImage->getClientOriginalExtension();
            $direction   = public_path('image/');
            $uploadImage->move($direction , $nameImage);
            $pathImage   = '/image/' . $nameImage;

            $request['image'] = $pathImage;

            Course::create($request->all());
                return redirect()->back()->with('success', __('message.add_success'));
        } else{
            return redirect()->back()->with('error', __('message.add_image'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(course $course)
    {
        //
    }

    public function showVideos($id)
    {
        $videos = Course::findOrFail($id)->videos;
        return view('dashboard.video.index', compact('videos'));
    }

    public function showQuizzes($id)
    {
        $quizzes = Course::findOrFail($id)->quizzes;
        return view('dashboard.quiz.index', compact('quizzes'));
    }

    public function showUsers($id)
    {
        $users = Course::findOrFail($id)->users;
        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $stages = Stage::all();
        return view('dashboard.course.edit', compact('course', 'stages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course = Course::findOrFail($id);
        if($request->hasFile('course_image')) {
            $uploadedImage = $request->file('course_image');
            $imageName     = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $direction     = public_path('/image');
            $uploadedImage->move($direction, $imageName);
            $imagePath     = '/image/' . $imageName;

            if(\File::exists(public_path($course->image))) {
                \File::delete(public_path($course->image));
            }
            $request['image'] = $imagePath;
        }
        $course->fill($request->all());
        $course->update();
            return redirect()->route('course.index')->with('success', __('message.update_success'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $course = Course::findOrFail($id);
            $course->delete();
            return redirect()->back()->with('success', __('message.delete_success'));
        }
        catch(ModelNotFoundException $ModelNotFoundException) {

            return redirect()->route('course.index')->with('error', __('message.not_found'));
        }
    }

    public function Multidestroy(Request $request) {

        try{
            $multiDeletes = $request->input('MultDelete');
            if($multiDeletes == null) {
                return redirect()->back()->with('error', __('message.select_item'));
            }
            $count = count($multiDeletes);
            Course::whereIn('id' , $multiDeletes)->delete();
            return redirect()->back()->with('success', __('message.multi_delete') . $count);
        }
        catch(ModelNotFoundException $ModelNotFoundException) {

            return redirect()->route('course.index')->with('error', __('message.not_found'));
        }
    }
}
