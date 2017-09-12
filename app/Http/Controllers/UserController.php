<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderByDesc('id')->get();
        return view('manage.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make(trim($request->password));

        if ($user->save()) {
            Session::flash('pranesimas', 'Vartotojas sėkmingai sukurtas!');
            return redirect()->route('users.show', $user->id);
        } else {
            Session::flash('status', 'Vartotojas dėl klaidos nesukurtas');
            return redirect()->route('users.create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id);
        return view('manage.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        $roles = Role::all();
        return view('manage.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if (trim($request->password) != '') {
            $user->password = Hash::make(trim($request->password));
        }

        if ($request->status_check == '1') {
            $user->status = 1;
        } else {
            $user->status = 0;
        }

        if ($user->save()) {
            $user->syncRoles(explode(',', $request->roles));
            Session::flash('success', 'Vartotojas sėkmingai išsaugotas!');
            return redirect()->route('users.show', $id);
        } else {
            Session::flash('status', 'Vartotojas dėl klaidos neišsaugotas');
            return redirect()->route('users.edit', $id);
        }
    }
}
