<?php

namespace App\Http\Controllers;

use App\Agency;
use App\Tour;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AgencyController extends Controller
{

    public function index()
    {
        $agencies = Agency::paginate(5);

        return view('admin.agencies.index', compact('agencies'));
    }


    public function create()
    {
        return view('admin.agencies.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $agency = new Agency([
            'name'=>$request->get('name')
        ]);
        $agency->save();

        return redirect()->route('agencies.index')
            ->with('success', 'Агентство успешно добавлено');
    }


    public function show(Agency $agency)
    {

        return view('admin.agencies.show', ['agency'=>$agency]);
    }


    public function edit(Agency $agency)
    {
        return view('admin.agencies.edit', compact('agency'));
    }


    public function update(Request $request, Agency $agency)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $agency->name = $request->get('name');
        $agency->save();

        return redirect('/admin/agencies')->with('success', 'Агентство успешно обновлено');
    }


    public function destroy(Agency $agency)
    {
        $agency->delete();

        return redirect()->route('agencies.index')->with('success', 'Агентство удалено');
    }

    public function allTours(Agency $agency)
    {
        $tours = Tour::where('agency_id', $agency->id)->get();
        return view('admin.agencies.tours', compact('tours', 'agency'));
    }

    public function agentTours()
    {
        $user = Auth::user();
        $userAgencyId = $user->agency_id;
        $agency = Agency::where('id', $userAgencyId)->first();
        $tours = Tour::where('agency_id', $userAgencyId)->get();

        return view('agent.tours.index', compact('tours', 'user', 'agency'));
    }
}
