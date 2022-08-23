<?php

namespace App\Http\Controllers;

use App\Models\meniu as R;
use App\Models\Dish as D;
use App\Models\Meniu as M;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMeniuRequest;
use App\Http\Requests\UpdateMeniuRequest;

class MeniuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $meniu = match ($request->sort)
        {
            'asc' => P::orderBy('name', 'asc')->get(),
            'desc' => P::orderBy('name', 'desc')->get(),
            default => P::all()
        };
        return view('meniu.index', ['menius'=> $meniu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meniu.create', ['restaurant' => R::all(), 'dishes' => D::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMeniuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meniu = new M;
        $meniu->name = $request->name;
        $meniu->save();

        return redirect()->route('m.index')->with('success', 'meniu created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meniu  $meniu
     * @return \Illuminate\Http\Response
     */
    public function show(Meniu $meniu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meniu  $meniu
     * @return \Illuminate\Http\Response
     */
    public function edit(int $meniuId)
    {
        return view('meniu.edit', [
            'meniu' => $meniu,
            'restaurant' => R::all(),
            'dishes' => D::all(),

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMeniuRequest  $request
     * @param  \App\Models\Meniu  $meniu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meniu $meniu)
    {
        $meniu->name = $request->name;
        $meniu->save();

        return redirect()->route('m.index')->with('success', 'meniu created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meniu  $meniu
     * @return \Illuminate\Http\Response
     */
    public function destroy(M $meniu)
    {
        $restaurant->delete();
        return redirect()->route('r.index')->with('deleted', 'Bye bye, I kill you!');
    }
}
