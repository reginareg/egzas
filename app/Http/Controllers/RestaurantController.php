<?php

namespace App\Http\Controllers;

use App\Models\Restaurant as R;
use App\Models\Dish as D;
use App\Models\Meniu as M;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $restaurants = match ($request->sort){
            'asc' => R::orderBy('name', 'asc')->get(),
            'desc' => R::orderBy('name', 'desc')->get(),
            default => R::all()
        };
        return view('restaurant.index', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('restaurant.create', ['meniu' => M::all(), 'dishes' => D::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new R;
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->code = $request->code;
        $restaurant->save();

        return redirect()->route('r.index')->with('success', 'Restaurant created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(int $restaurantId)
    {
        $restaurantId= R::where('id', $restaurantId)->first();
        return view('restaurant.show', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(R $restaurant)
    {
    
        return view('restaurant.edit', [
            'restaurant' => $restaurant,
            'meniu' => M::all(),
            'dishes' => D::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurantRequest  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, R $restaurant)
    {
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->code = $request->code;
        $restaurant->save();

        return redirect()->route('r.index')->with('success', 'You are the best!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(R $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('r.index')->with('deleted', 'Bye bye, I kill you!');
    }
}
