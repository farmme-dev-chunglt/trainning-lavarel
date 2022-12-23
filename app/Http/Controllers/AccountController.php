<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccountRequest  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */

    public function destroy(Account $account)
    {
        //
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $login = [
            'account' => $request->account,
            'password' => $request->password,
        ];
        $validator = Validator::make($request->all(),[
            'account' => 'required|min:6',
            'password' => 'required|min:6',
        ]);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        dd(Auth::login($login));
        if(Auth::attempt($login)){
           return redirect()->route('product.index');
        }
        return back()->with('err');
    }

    public function register()
    {
        return view('auth.register');
    }
    
    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'account' => 'required|min:6',
            'password' => 'required|min:6',
        ]);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        Account::create($request->all());
        return redirect()->route('register');
    }
}
