<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Stage;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stages = Stage::all();
        return view('dashboard.user.create', compact('stages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if($request->hasFile('user_image')) {
            $uploadImage = $request->file('user_image');
            $nameImage   = time() . '.' . $uploadImage->getClientOriginalExtension();
            $direction   = public_path('image/');
            $uploadImage->move($direction , $nameImage);
            $pathImage   = '/image/' . $nameImage;

            $request['image'] = $pathImage;
            $request['password'] = bcrypt($request->password);
            User::create($request->all());
                return redirect()->route('user.index')->with('success', __('message.add_success'));
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

    public function showUserCourses($id)
    {
        $courses = User::findOrFail($id)->courses;
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
        $user = User::findOrFail($id);
        $stages = Stage::all();
        return view('dashboard.user.edit', compact('user', 'stages'));
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
        $user = User::findOrFail($id);
        if($request->hasFile('user_image')) {
            $uploadedImage = $request->file('user_image');
            $imageName     = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $direction     = public_path('/image');
            $uploadedImage->move($direction, $imageName);
            $imagePath     = '/image/' . $imageName;

            if(\File::exists(public_path($user->image))) {
                \File::delete(public_path($user->image));
            }
            $request['image'] = $imagePath;
        }
        $request->validate([
            'name'      => 'required|min:3',
            'email'     => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password'  => 'sometimes|string|min:6|confirmed'
        ]);
        $request['password'] = bcrypt($request->password);
        $user->fill($request->all());
        $user->update();
            return redirect()->route('user.index')->with('success', __('message.update_success'));
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
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->back()->with('success', __('message.delete_success'));
        }
        catch(ModelNotFoundException $ModelNotFoundException) {

            return redirect()->route('user.index')->with('error', __('message.not_found'));
        }
    }

    public function Multidestroy(Request $request) {

        try{
            $multiDeletes = $request->input('MultDelete');
            if($multiDeletes == null) {
                return redirect()->back()->with('error', __('message.select_item'));
            }
            $count = count($multiDeletes);
            User::whereIn('id' , $multiDeletes)->delete();
            return redirect()->back()->with('success', __('message.multi_delete') . $count);
        }
        catch(ModelNotFoundException $ModelNotFoundException) {

            return redirect()->route('user.index')->with('error', __('message.not_found'));
        }
    }
}
