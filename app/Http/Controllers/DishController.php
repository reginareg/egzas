<?php

namespace App\Http\Controllers;

use App\Models\Restaurant as R;
use App\Models\Dish as D;
use App\Models\Meniu as M;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dish = match ($request->sort)
        {
            'asc' => M::orderBy('name', 'asc')->get(),
            'desc' => M::orderBy('name', 'desc')->get(),
            default => M::all()
        };
        return view('dish.index', ['dish'=> $dish]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dish.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dish = new D;
        $dish -> name = $request->name;
        $dish -> about = $request->about;
        $dish -> photo = $request->photo;
        $dish->save();
        return redirect()->route('d.index')->with('success', 'Dish created!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(int $dishId)
    {
        $dishId= D::where('id', $dishId)->first();
        return view('dish.show', ['dish' => $dishId]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(D $dish)
    {
        return view('dish.edit', [
            'dish' => $dish,
            'meniu' => M::all(),
            'restaurant' => R::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDishRequest  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, D $dish)
    {
        $dish -> name = $request->name;
        $dish -> about = $request->about;
        $dish -> photo = $request->photo;
        $dish->save();
        return redirect()->route('d.index')->with('success', 'Dish created!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(D $dish)
    {
        $dish->delete();

        return redirect()->route('d.index')->with('deleted', 'Bye bye, I kill you!');  
    }
}
