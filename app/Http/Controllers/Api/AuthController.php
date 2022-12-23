<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends BaseController
{
    public function createUser(Request $request){
        $validator = Account::validate($request->only(['account', 'password']));
        if ($validator->fails()) {
            return response()->json([
                    'message' => 'validation error',
                    'errors' => $validator->errors(),
            ],401);
        }
        try{
            $user=Account::create([
                'account' => $request->account,
                'password' => Hash::make($request->password),
            ]);
        }
        catch (\Illuminate\Database\QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            if($errorInfo[1] == 1062){
                return response()->json([
                    'message' => 'we have a duplicate entry problem',
                ],401);
            }
            else return response()->json([
                'message' => 'err',
            ],401);
        };
        return response()->json([
            'message' => 'register successful',
            'token'=> $user->createToken("Header")->plainTextToken
            , 201]
        );     
    }

    public function loginUser(Request $request){
        $data = $request->only(['account', 'password']);
        $validator = Account::validate($data);
        if ($validator->fails()) {
            return response()->json([
                    'message' => 'validation error',
                    'errors' => $validator->errors(),
            ],401);
        }
        if(!Auth::attempt($data)){
            return response()->json([
                'message' => 'login err'
                , 401]
            );     
        }
        $user=Account::where('account',$request->account)->first();
        return response()->json([
            'message' => 'login successful',
            'token'=> $user->createToken("Header")->plainTextToken
            , 201]
        );     
    }
}
