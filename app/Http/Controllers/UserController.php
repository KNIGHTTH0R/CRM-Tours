<?php

namespace App\Http\Controllers;

use App\User;
use App\Agency;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(5);
        return view('admin.users.index', ['users'=>$users]);
    }

    public function create()
    {
        $agencies = Agency::all();
        return view('admin.users.create', compact('agencies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'is_admin' => 'nullable',
            'is_agent' => 'nullable',
            'password' => 'min:3'
        ]);

        User::create([
           'name'  => $request->get('name'),
           'email' => $request->get('email'),
           'is_admin' => $request->get('is_admin'),
           'is_agent' => $request->get('is_agent'),
           'password' => Hash::make($request->get('password')),
           'phone' => $request->get('phone'),
           'agency_id' => $request->get('agency_id'),
        ]);
        return redirect()->route('users.index')->with('success', 'Пользователь успешно добавлен');
    }


    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }


    public function edit(User $user)
    {
        $agencies = Agency::all();
        return view('admin.users.edit', compact('user', 'agencies'));
    }


    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        $user->save();
        return redirect()->route('users.index')->with('success', 'Данные обновлены');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Пользователь удален');

    }
}
