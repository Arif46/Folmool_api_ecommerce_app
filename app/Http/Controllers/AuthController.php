<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use DB;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|max:55',
            'email'=>'email|required|unique:users',
            'password'=>'required|confirmed'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=> $user, 'access_token'=> $accessToken]);
    }

    public function login(Request $request)

      {
            $loginData = $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            if(!auth()->attempt($loginData)) {
                return response()->json(['success'=>false,'user'=>auth()->user(),'token'=>null,
                'message'=>'Sorry your user name or password wrong']);
            }


                $accessToken = auth()->user()->createToken('authToken')->accessToken;

               return response()->json(['success'=>true,'user' => auth()->user(), 'token' => $accessToken,'message'=>'Success message']);


        }
        public function deliverymanlogin(Request $request)
        {
            $loginData = $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            if(!auth()->attempt($loginData)) {
                return response()->json(['success'=>false,'user'=>auth()->user(),'token'=>null,
                'message'=>'Sorry your user name or password wrong']);
            }

            if(auth()->user()->admin_approval == 1){
                $accessToken = auth()->user()->createToken('authToken')->accessToken;

               return response()->json(['success'=>true,'user' => auth()->user(), 'token' => $accessToken,'message'=>'Success message']);
            }else{
                return response()->json(['success'=>false, 'token' => null,'message'=>'you do not  have admin access']);
            }
        }


public function logoutApi(Request $request)
{
  $request->user()->token()->revoke();
    return response()->json([
      'message' => 'Successfully logged out'
    ]);
}


}
