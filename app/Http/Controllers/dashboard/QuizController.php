<?php

namespace App\Http\Controllers\dashboard;

use App\Quiz;
use App\Stage;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests\QuizRequest;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::all();
        return view('dashboard.quiz.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stages = Stage::all();
        $courses = Course::all();
        return view('dashboard.quiz.create', compact('stages', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizRequest $request)
    {
        if($request->hasFile('quiz_image')) {
            $uploadImage = $request->file('quiz_image');
            $nameImage   = time() . '.' . $uploadImage->getClientOriginalExtension();
            $direction   = public_path('image/');
            $uploadImage->move($direction , $nameImage);
            $pathImage   = '/image/' . $nameImage;

            $request['image'] = $pathImage;
            Quiz::create($request->all());
                return redirect()->route('quiz.index')->with('success', __('message.add_success'));
        } else{
            return redirect()->back()->with('error', __('message.add_image'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    public function showQuizQuestions($id)
    {
        $questions = Quiz::findOrFail($id)->questions;
        return view('dashboard.question.index', compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stages = Stage::all();
        $courses = Course::all();
        $quiz = Quiz::findOrFail($id);
        return view('dashboard.quiz.edit', compact('stages', 'courses', 'quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(QuizRequest $request, $id)
    {
        $quiz = Quiz::findOrFail($id);
        if($request->hasFile('quiz_image')) {
            $uploadedImage = $request->file('quiz_image');
            $imageName     = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $direction     = public_path('/image');
            $uploadedImage->move($direction, $imageName);
            $imagePath     = '/image/' . $imageName;

            if(\File::exists(public_path($quiz->image))) {
                \File::delete(public_path($quiz->image));
            }
            $request['image'] = $imagePath;
        }
        $quiz->fill($request->all());
        $quiz->update();
            return redirect()->route('quiz.index')->with('success', __('message.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $quiz = Quiz::findOrFail($id);
            $stageProject = $stage->products()->count();
            if($stageProject > 0) {
                return back()->with('error', __('message.error_delete'));
            } else{
                $quiz->delete();
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
            Quiz::whereIn('id' , $multiDeletes)->delete();
            return redirect()->back()->with('success' , __('message.multi_delete') . $count);
        }
        catch(ModelNotFoundException $ModelNotFoundException) {

            return redirect()->route('quiz.index')->with('error', __('message.not_found'));
        }
    }
}
