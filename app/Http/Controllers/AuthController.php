<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'account' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $token_validity = 24 * 60;

        // $this->guard()->factory()->setTTL($token_validity);
        Auth::factory()->setTTL($token_validity);

        if(!Auth::attempt($request->only('email','password','account'))){
        // if (!$token = $this->guard()->attempt($validator->validated())) {//jwt awal
            // if (!$token = Auth::guard()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // return $this->respondWithToken($token); //slinya
        // return $this->respondWithToken($token)->withCookie($cookie); //add cookies
        $user = Auth::user();

        //token
        $token = $user->createToken('token')->plainTextToken;
        
        //added to cookies
        $cookie = cookie('jwt', $token, 60*24);


        return  response([
            'message' => 'Login Success. ',
            'token'=> $token
        ])->withCookie($cookie);
    }

    public function tes(){
        $this->user = Auth::user();
        return $this->user;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'account' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                $validator->errors()
            ], 422);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json(['message' => 'User created successfully.', 'user' => $user]);
    }

    public function logout()
    {
        //Delete cookie
        $cookie = Cookie::forget('jwt');
        
        // $this->guard()->logout();
        // Auth::guard()->logout();
        // Auth::logout();


        return response()->json(['message' => 'User loged out successfully.'])->withCookie($cookie);
    }

    public function profile()
    {

        // return response()->json($this->guard()->user());
        return Auth::user();
    }


    public function refresh()
    {
        // return $this->respondWithToken($this->guard()->refresh());
        return $this->respondWithToken(Auth::refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'token_validity' => $this->guard()->factory()->getTTL() * 60
            // 'token_validity' => Auth::factory()->getTTL() * 60
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
