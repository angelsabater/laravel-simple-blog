<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $data['users'] = User::select('users.id', 'users.name', 'users.email', 'users.username', 'roles.role')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->orderBy('users.id', 'asc')
            ->get();

        return view('admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles'] = Role::get();

        return view('admin.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request);
        $request->validate([
            'name'             => 'required',
            'email'            => 'required|email',
            'username'         => 'required|min:8|max:255',
            'password'         => 'required|min:8|max:255',
            'role_id'          => 'required',
        ]);

        $user = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role_id  = $request->role_id;
        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['roles'] = Role::get();

        return view('admin.edit', compact('user'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'             => 'required',
            'email'            => 'required|email',
            'username'         => 'required|min:8|max:255',
            'password'         => 'nullable|min:8|max:255',
            'role_id'          => 'required',
        ]);

        if($request->password != null) {
            $user->password = Hash::make($request->password);
        }

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->username = $request->username;
        $user->role_id  = $request->role_id;
        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User has been deleted successfully');
    }
}
