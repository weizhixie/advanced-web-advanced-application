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
            'description' => 'max:2000',
            'snackImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('snackImage'))
        {
            $request->file('snackImage')->store('images','public');
            $snack = new Snack([
                'name' => $request->get('name'),
                'popularity'=> $request->get('popularity'),
                'description'=> $request->get('description'),
                'snackImage' => $request->file('snackImage')->hashName(),
            ]);
            $snack->save();
        }
        else
        {
            $snack = new Snack([
                'name' => $request->get('name'),
                'popularity'=> $request->get('popularity'),
                'description'=> $request->get('description'),
            ]);
            $snack->save();
        }
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
            'description' => 'max:2000',
            'snackImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('snackImage'))
        {
            $request->file('snackImage')->store('images','public');
            $snack = new Snack([
                'name' => $request->get('name'),
                'popularity'=> $request->get('popularity'),
                'description'=> $request->get('description'),
                'snackImage' => $request->file('snackImage')->hashName(),
            ]);
            $snack->save();
        }
        else
        {
            $snack = new Snack([
                'name' => $request->get('name'),
                'popularity'=> $request->get('popularity'),
                'description'=> $request->get('description'),
            ]);
            $snack->save();
        }
        return redirect()->route('index');
    }

    public function destroy(Snack $snack)
    {
        $snack->delete();
        return redirect()->route('index');
    }
}
