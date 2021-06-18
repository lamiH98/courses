<?php

namespace App\Http\Controllers\dashboard;

use App\Video;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('dashboard.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('dashboard.video.create', compact('courses'));
    }

    public function createCourseVideo($id)
    {
        $course = Course::findOrFail($id);
        return view('dashboard.video.createCourseVideo', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        if($request->hasFile('video_image')) {
            $uploadImage = $request->file('video_image');
            $nameImage   = time() . '.' . $uploadImage->getClientOriginalExtension();
            $direction   = public_path('image/');
            $uploadImage->move($direction , $nameImage);
            $pathImage   = '/image/' . $nameImage;

            $request['image'] = $pathImage;
            Video::create($request->all());
                return redirect()->route('video.index')->with('success', __('message.add_success'));
        } else{
            return redirect()->back()->with('error', __('message.add_image'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        $courses = Course::all();
        return view('dashboard.video.edit', compact('video', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, $id)
    {
        $video = Video::findOrFail($id);
        if($request->hasFile('video_image')) {
            $uploadedImage = $request->file('video_image');
            $imageName     = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $direction     = public_path('/image');
            $uploadedImage->move($direction, $imageName);
            $imagePath     = '/image/' . $imageName;

            if(\File::exists(public_path($video->image))) {
                \File::delete(public_path($video->image));
            }
            $request['image'] = $imagePath;
        }
        $video->fill($request->all());
        $video->update();
            return redirect()->route('video.index')->with('success', __('message.update_success'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $video = Video::findOrFail($id);
            $video->delete();
            return redirect()->back()->with('success', __('message.delete_success'));
        }
        catch(ModelNotFoundException $ModelNotFoundException) {

            return redirect()->route('video.index')->with('error', __('message.not_found'));
        }
    }

    public function Multidestroy(Request $request) {

        try{
            $multiDeletes = $request->input('MultDelete');
            if($multiDeletes == null) {
                return redirect()->back()->with('error', __('message.select_item'));
            }
            $count = count($multiDeletes);
            Video::whereIn('id' , $multiDeletes)->delete();
            return redirect()->back()->with('success', __('message.multi_delete') . $count);
        }
        catch(ModelNotFoundException $ModelNotFoundException) {

            return redirect()->route('video.index')->with('error', __('message.not_found'));
        }
    }
}
