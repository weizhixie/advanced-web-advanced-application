<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use Illuminate\Http\Request;

class SnackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $snack = Snack::all();

        //return view('snack.index', ['snack' => $snack]);
        return view('snack.index', compact('snack'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('snack.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:2|max:32',
        ]);

        $attributes = $request->all(
            'name',
            'description',
        );

        $attributes['popularity'] = 0;

        $snack = Snack::create($attributes);

        return redirect($snack->path);
    }

    public function show(Snack $snack)
    {
        return view('snack.show', compact('snack'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Snack  $snack
     * @return \Illuminate\Http\Response
     */
    public function edit(Snack $snack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Snack  $snack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Snack $snack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Snack  $snack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Snack $snack)
    {
        //
    }
}
