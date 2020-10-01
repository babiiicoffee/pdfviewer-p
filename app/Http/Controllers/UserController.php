<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;

class UserController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    //
    public function register(UserRegisterRequest $request) {

        $user = User::where('email', $request->email)->first();
        if (isset($user)) {
            return response()->json(['error' => 'email already taken'], 401);
        }

        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            DB::commit();
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function login(LoginRequest $request)
    {
        $data = $request->all();
        $user = DB::table('users')->where('email', $data['email'])->where('password', $data['password'])->get();
        if(count($user) > 0) {
            $data['status'] = true;
            return $data;
        } else {
            $data['status'] = false;
            return $data;
        }
        // $data = $request->only("email", "password");
        // $user = DB::table('users')->where('email', $data['email'])->where('password', $data['password'])->get();
        // Log::info($user);
        // print_r($user);
        // if(count($user) > 0) {
        //     $data['status'] = true;
        //     return $data;
        // } else {
        //     $data['status'] = false;
        //     return $data;
        // }
    }

    // public function formSubmit(Request $request)
    // {
    // 	return response()->json([$request->all()]);
    // }
}
