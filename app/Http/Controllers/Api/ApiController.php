<?php

namespace App\Http\Controllers\Api;

use App\Slider;
use App\Stage;
use App\Course;
use App\Quiz;
use App\User;
use App\Question;
use App\Video;
use App\Setting;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use DB;

class ApiController extends Controller
{
    use GeneralTrait;

    public function sliders()
    {
        $sliders = Slider::all();
        return $this->sendResponse('sliders', $sliders, 'all slider');
    }

    public function stages()
    {
        $stages = Stage::all();
        return $this->sendResponse('stages', $stages, 'all stages');
    }

    public function courses()
    {
        $courses = Course::all();
        return $this->sendResponse('courses', $courses, 'all courses');
    }

    public function userCourses($id)
    {
        $userCourses = User::findOrFail($id)->courses;
        return $this->sendResponse('userCourses', $userCourses, 'all user courses');
    }

    public function addCourseUser(Request $request)
    {
        DB::table('user_course')->insert([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'progress' => $request->progress
        ]);
        return $this->sendSuccess('added successfully');
    }

    public function stageCourses($id)
    {
        $stageCourses = Stage::findOrFail($id)->courses;
        return $this->sendResponse('stageCourses', $stageCourses, 'all stage courses');
    }

    public function courseQuizzes($id)
    {
        $courseQuizzes = Course::findOrFail($id)->quizzes;
        return $this->sendResponse('courseQuizzes', $courseQuizzes, 'all course quizzes');
    }

    public function courseVideoes($id)
    {
        $courseVideoes = Course::findOrFail($id)->videos;
        return $this->sendResponse('courseVideoes', $courseVideoes, 'all course videoes');
    }

    public function quizQuestions($id)
    {
        $quizQuestions = Quiz::findOrFail($id)->questions;
        return $this->sendResponse('quizQuestions', $quizQuestions, 'all course videoes');
    }

    public function quizzes()
    {
        $quizzes = Quiz::all();
        return $this->sendResponse('quizzes', $quizzes, 'all quizzes');
    }

    public function questions()
    {
        $questions = Question::all();
        return $this->sendResponse('questions', $questions, 'all questions');
    }

    public function videoes()
    {
        $videoes = Video::all();
        return $this->sendResponse('videoes', $videoes, 'all videoes');
    }

    public function setting()
    {
        $setting = Setting::all();
        return $this->sendResponse('setting', $setting, 'setting');
    }

}
