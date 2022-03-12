<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Lang;
use Validator;
use Auth;
use DB;
use App\Models\User;
use Illuminate\Support\Arr;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guest()) {
            return redirect()->route('login');
        }
        $users = User::all();
        return view('users.index')->with('users', $users);
    }
    public function loginView()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if ($validator->fails()) {
            return redirect()->route('login')->with('errors', $validator->errors());
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
        return redirect()->route('login')->with('errors', [Lang::get('messages.loginFailed')]);
    }
    public function logout () {
        //logout user
        Auth::logout();
        return redirect()->route('login');
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'password' => 'required|string'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);
        auth()->login($user);
        return redirect()->route('system.home');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'password' => 'required|string'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);
        $user->assignRole($request->input('roles'));
        session()->flash('success', 'new user added successfully!');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        return view('users.show')->with('user', $user)->with('roles', $roles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole'));
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
        $user = User::find($id);
        if (!$user) {
            session()->flash('error', 'this user does not exist!');
            return redirect()->route('users.index');
        }
        $input = $request->all();
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        session()->flash('success', 'user updated!');
        return redirect()->route('users.index');
    }
    public function activate($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('errors', ['this user does not exist!']);
        }
        $user->is_active = 1;
        $user->update();
        session()->flash('success', 'user has been activated!');
        return redirect()->route('users.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            session()->flash('error', 'this user does not exist!');
            return redirect()->route('users.index');
        }
        $user->is_active = 0;
        $user->update();
        session()->flash('success', 'user has been banned from the system!');
        return redirect()->route('users.index');
    }
}