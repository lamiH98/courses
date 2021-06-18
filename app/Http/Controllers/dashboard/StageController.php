<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stage;
use App\Http\Requests\StageRequest;

class StageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::all();
        return view('dashboard.stage.index', compact('stages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stages = Stage::all();
        return view('dashboard.stage.create', compact('stages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StageRequest $request)
    {
        if($request->hasFile('stage_image')) {
            $uploadImage = $request->file('stage_image');
            $nameImage   = time() . '.' . $uploadImage->getClientOriginalExtension();
            $direction   = public_path('image/');
            $uploadImage->move($direction , $nameImage);
            $pathImage   = '/image/' . $nameImage;

            $request['image'] = $pathImage;
            Stage::create($request->all());
                return redirect()->route('stage.index')->with('success', __('message.add_success'));
        } else{
            return redirect()->back()->with('error', __('message.add_image'));
        }
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

    public function showCourses($id)
    {
        $courses = Stage::findOrFail($id)->courses;
        return view('dashboard.course.index', compact('courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stage = Stage::findOrFail($id);
        return view('dashboard.stage.edit', compact('stage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StageRequest $request, $id)
    {
        $stage = Stage::findOrFail($id);
        if($request->hasFile('stage_image')) {
            $uploadedImage = $request->file('stage_image');
            $imageName     = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $direction     = public_path('/image');
            $uploadedImage->move($direction, $imageName);
            $imagePath     = '/image/' . $imageName;

            if(\File::exists(public_path($stage->image))) {
                \File::delete(public_path($stage->image));
            }
            $request['image'] = $imagePath;
        }
        $stage->fill($request->all());
        $stage->update();
            return redirect()->route('stage.index')->with('success', __('message.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $stage = Stage::findOrFail($id);
            $stageProject = $stage->products()->count();
            if($stageProject > 0) {
                return back()->with('error', __('message.error_delete'));
            } else{
                $stage->delete();
                return redirect()->back()->with('success' , __('message.delete_success'));
            }
        }
        catch(ModelNotFoundException $ModelNotFoundException) {

            return redirect()->route('stage.index')->with('error', __('message.not_found'));
        }
    }

    public function Multidestroy(Request $request) {

        try{
            $multiDeletes = $request->input('MultDelete');
            if($multiDeletes == null) {
                return redirect()->back()->with('error' , __('message.select_item'));
            }
            $count = count($multiDeletes);
            Stage::whereIn('id' , $multiDeletes)->delete();
            return redirect()->back()->with('success' , __('message.multi_delete') . $count);
        }
        catch(ModelNotFoundException $ModelNotFoundException) {

            return redirect()->route('stage.index')->with('error', __('message.not_found'));
        }
    }
}
