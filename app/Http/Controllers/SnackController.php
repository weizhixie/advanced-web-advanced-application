<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SnackController extends Controller
{

    public function index()
    {
        $snack = Snack::query () -> orderByDesc ('popularity') ->paginate(10);
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

        $user_id = auth()->user()->id;

        if ($request->hasFile('snackImage'))
        {
            $request->file('snackImage')->store('images','public');
            $snack = Snack::create([
                'name' => $request->get('name'),
                'popularity'=> $request->get('popularity'),
                'description'=> $request->get('description'),
                'snackImage' => $request->file('snackImage')->hashName(),
                'user_id' => $user_id,
            ]);
        }
        else
        {
            $snack = Snack::create([
                'name' => $request->get('name'),
                'popularity'=> $request->get('popularity'),
                'description'=> $request->get('description'),
                'user_id' => $user_id,
            ]);
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
            $this->removeOldImage($snack);

            $request->file('snackImage')->store('images','public');
            $snack->update([
                'name' => $request->get('name'),
                'popularity'=> $request->get('popularity'),
                'description'=> $request->get('description'),
                'snackImage' => $request->file('snackImage')->hashName(),
            ]);
        }
        else
        {
            $snack->update([
                'name' => $request->get('name'),
                'popularity'=> $request->get('popularity'),
                'description'=> $request->get('description'),
            ]);
        }
        return redirect()->route('index');
    }

    public function destroy(Snack $snack)
    {
        $snack->delete();
        return redirect()->route('index');
    }

    protected function removeOldImage(Snack $snack)
    {
        $image_name = $snack->snackImage;
        if($image_name)
        {   //remove old image if new image uploaded
            Storage::disk('public')->delete('/images/'.$image_name);
        }
    }
}
