<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use Illuminate\Http\Request;

class SnackController extends Controller
{

    public function index()
    {
        $snack = Snack::query () -> orderByDesc ('popularity') ->paginate(6);

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
            'popularity' => 'numeric|min:0|max:10',
        ]);

        $attributes = $request->all(
            'name',
            'popularity',
            'description',
        );

        $snack = Snack::create($attributes);

        return redirect($snack->path);
    }

    public function show(Snack $snack)
    {
        return view('snack.show', compact('snack'));
    }

    public function edit(Snack $snack)
    {
        return view('snack.edit', compact('snack'));
    }


    public function update(Request $request, Snack $snack)
    {
        request()->validate([
            'name' => 'required|min:2|max:32',
            'popularity' => 'numeric|min:0|max:10',
        ]);

        $attributes = $request->all(
            'name',
            'popularity',
            'description',
            );

        $snack->update($attributes);

        return redirect()->route('index');
    }

    public function destroy(Snack $snack)
    {
        $snack->delete();

        return redirect()->route('index');
    }
}
