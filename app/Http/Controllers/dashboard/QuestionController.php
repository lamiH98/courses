<?php

namespace App\Http\Controllers\dashboard;

use App\Quiz;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('dashboard.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizes = Quiz::all();
        return view('dashboard.question.create', compact('quizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        if($request->hasFile('question_image')) {
            $uploadImage = $request->file('question_image');
            $nameImage   = time() . '.' . $uploadImage->getClientOriginalExtension();
            $direction   = public_path('image/');
            $uploadImage->move($direction , $nameImage);
            $pathImage   = '/image/' . $nameImage;

            $request['image'] = $pathImage;
            Question::create($request->all());
                return redirect()->route('question.index')->with('success', __('message.add_success'));
        } else{
            return redirect()->back()->with('error', __('message.add_image'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quizes = Quiz::all();
        $question = Question::findOrFail($id);
        return view('dashboard.question.edit', compact('question', 'quizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        if($request->hasFile('question_image')) {
            $uploadedImage = $request->file('question_image');
            $imageName     = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $direction     = public_path('/image');
            $uploadedImage->move($direction, $imageName);
            $imagePath     = '/image/' . $imageName;

            if(\File::exists(public_path($question->image))) {
                \File::delete(public_path($question->image));
            }
            $request['image'] = $imagePath;
        }
        $question->fill($request->all());
        $question->update();
            return redirect()->route('question.index')->with('success', __('message.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $question = Question::findOrFail($id);
            $stageProject = $stage->products()->count();
            if($stageProject > 0) {
                return back()->with('error', __('message.error_delete'));
            } else{
                $question->delete();
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
            Question::whereIn('id' , $multiDeletes)->delete();
            return redirect()->back()->with('success' , __('message.multi_delete') . $count);
        }
        catch(ModelNotFoundException $ModelNotFoundException) {

            return redirect()->route('question.index')->with('error', __('message.not_found'));
        }
    }
}
