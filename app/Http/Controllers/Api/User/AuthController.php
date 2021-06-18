<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use Auth;
use App\User;

class AuthController extends Controller
{

    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $this->sendResponse('users', $users, 'All Users');
    }

    public function getUser() {
        $user = Auth::guard('user-api')->user();
        return $this->sendResponse('user', $user);
    }

    public function login(Request $request) {

        try {
            $rules = [
                "email" => "required",
                "password" => "required"
            ];

            $validator = Validator::make($request->all(), $rules);
            //login
            $credentials = $request->only(['email', 'password', 'device_token']);

            $token = Auth::guard('user-api')->attempt($credentials);  //generate token

            if (!$token)
                return $this->sendError($token);

            $user = Auth::guard('user-api')->user();
            $user->api_token = $token;
            return $this->sendResponse('token', $token, 'User');  //return json response

        } catch (\Exception $ex) {
            return sendError($ex->getMessage());
        }
    }

    public function register(Request $request) {
        try {
            $rules = [
                'name'  => 'required',
                "email" => "required",
                "password" => "required",
                "phone" => "required",
            ];
            $validator = Validator::make($request->all(), $rules);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'stage_id' => $request->stage_id,
                'device_token' => $request->device_token
            ]);

            $credentials = $request->only(['email', 'password']);

            $token = Auth::guard('user-api')->attempt($credentials);  //generate token

            if (!$token)
                return $this->sendError('بيانات الدخول غير صحيحة');

            $user = Auth::guard('user-api')->user();
            $user->api_token = $token;

            return $this->sendResponse('user', $user, 'User');  //return json response
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }

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
        // $request->validate([
        //     'name'      => 'required|min:3',
        //     'email'     => 'required|string|email|max:191|unique:users,email,'.$user->id,
        //     'password'  => 'sometimes|string|min:6|confirmed'
        // ]);
        $request['password'] = bcrypt($request->password);
        $user->fill($request->all());
        $user->update();
        return $this->sendSuccess('updated successfully');
    }

    public function logout(Request $request) {
        $token = $request->header('auth-token');
        if($token) {
            try {
                JWTAuth::setToken($token)->invalidate(); //logout
            }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
                return  $this->sendError('some thing went wrongs');
            }
            return $this->sendSuccess('Logged out successfully');
        } else {
            $this->sendError('some thing went wrongs');
        }
    }

}
