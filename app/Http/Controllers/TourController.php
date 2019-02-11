<?php

namespace App\Http\Controllers;

use App\Agency;
use App\Http\Requests\TourStoreRequest;
use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{

    public function index()
    {

        $tours = Tour::paginate(5);

        if(Auth::user()->is_admin){
            return view('admin.tours.index', compact('tours'));
        } else {
            return redirect()->route('home');
        }
    }


    public function create()
    {
        $agencies = Agency::all();
        $mealServises = ['OB', 'BB', 'HB', 'FB', 'AI'];
        return view('admin.tours.create', compact('agencies', 'mealServises'));
    }


    public function store(TourStoreRequest $request)
    {
        Tour::create($request->all());

        return redirect()->route('tours.index')->with('success', 'Тур успешно добавлен');

    }


    public function show(Tour $tour)
    {
        return view('admin.tours.show', compact('tour'));
    }


    public function edit(Tour $tour)
    {
        $mealServises = ['OB', 'BB', 'HB', 'FB', 'AI'];
        $agencies = Agency::all();
        $user = Auth::user();
        if($user->is_agent) {
            return view('agent.tours.edit', compact('tour', 'mealServises', 'agencies'));
        }
        return view('admin.tours.edit', compact('tour', 'mealServises', 'agencies'));
    }


    public function update(TourStoreRequest $request, Tour $tour)
    {
        $tour->fill($request->all());
        $tour->save();

        $user = Auth::user();
        if($user->is_agent) {
            return redirect()->route('agent.tours');
        }

        return redirect()->route('tours.index')->with('success', 'Тур успешно обновлен');
    }


    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('tours.index')->with('success', 'Тур успешно удален');
    }
}
