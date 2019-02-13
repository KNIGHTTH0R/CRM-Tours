<?php

namespace App\Http\Controllers;

use App\Tour;
use App\User;
use App\Agency;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use vendor\project\StatusTest;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(5);
        if(Auth::user()->is_admin){
            return view('admin.users.index', ['users'=>$users]);
        } else {
            return redirect()->route('home');
        }
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
            'password' => 'min:6'
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
        $agent = Auth::user();

        $agency = Agency::where('id', $agent->agency_id)->first();
        $tours = Tour::where('agency_id', $agent->agency_id)->get();
        if($agent->is_agent) {
            return view('agent.users.edit', compact('tours', 'user', 'agency', 'agent', 'users'));
        }
        return view('admin.users.edit', compact('user', 'agencies'));
    }


    public function update(Request $request, User $user)
    {
        $agent = Auth::user();
        $users = User::where('agency_id', $agent->agency_id)->get();
        $agency = Agency::where('id', $agent->agency_id)->first();
        $tour = Tour::where('id', $request->get('tour_id'))->first();

        if($user->tours->contains($tour)) {
            return redirect()->route('agent.users')->with('success', 'Этот тур уже был добавлен данному пользователю');
        }
        if($request->get('tour_id')) {
            $user->tours()->save($tour);
        } else {
            $user->fill($request->all());
            $user->save();
        }
        if($agent->is_agent) {
            return view('agent.users.index', compact('tours', 'user', 'agent', 'agency', 'users'));
        }
        return redirect()->route('users.index')->with('success', 'Данные обновлены');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Пользователь удален');

    }

    public function tourDelete(Request $request, User $user)
    {
        $agent = Auth::user();
        $users = User::where('agency_id', $agent->agency_id)->get();
        $agency = Agency::where('id', $agent->agency_id)->first();
        $user->tours()->detach($request->get('detach_id'));
        $user->save();

        return view('agent.users.index', compact('tours', 'user', 'agent', 'agency', 'users'));
    }

    public function tourStatus(Request $request, User $user)
    {
        $agent = Auth::user();
        $users = User::where('agency_id', $agent->agency_id)->get();
        $agency = Agency::where('id', $agent->agency_id)->first();
        $user->tours()->syncWithoutDetaching(
            [$request->get('tour_id') => ['status' => $request->get('tour_status')]]
        );
        $user->save();

        return view('agent.users.index', compact('tours', 'user', 'agent', 'agency', 'users'));
    }

    public function agencyUsers()
    {
        $agent = Auth::user();
        $users = User::where('agency_id', $agent->agency_id)->get();
        $agency = Agency::where('id', $agent->agency_id)->first();
        return view('agent.users.index', compact('users', 'agent', 'agency'));
    }
}
