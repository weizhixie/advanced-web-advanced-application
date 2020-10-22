<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use Illuminate\Http\Request;

class SnackController extends Controller
{

    public function index()
    {
        $snack = Snack::paginate(6);

        return view('snack.index', compact('snack'));
    }

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

    public function destroy(Snack $snack)
    {
        $snack->delete();

        return redirect()->route('index');
    }
}
