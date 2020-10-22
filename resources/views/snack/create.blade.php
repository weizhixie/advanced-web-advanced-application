@extends('layouts.app')

@section('sidebar')
    <div class="text-4xl mb-8">
        <h1>Add a new Snack</h1>
    </div>
@endsection

@section('content')

    <form method="post" action="/add_snack">
        @csrf

        <div class="flex flex-wrap">
            <div class="w-full">
                <label class="block" for="name">Snack name:</label>
                <input class="block w-2/5 @error ('name') border border-red-500 @enderror"
                       type="text" name="name" data-lpignore="true" autocomplete="off" placeholder="e.g. Oreo" />
                @error ('name')
                <div class="alert-message">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap">
            <div class="w-full">
                <label class="block" for="description">Description:</label>
                <textarea class="block w-8/12" rows="5"
                          name="description" placeholder="talk about the snack"></textarea>
            </div>
        </div>

        <div class="flex flex-wrap mt-8">
            <div class="w-full">
                <button class="nav-button" type="submit"><i class="fas fa-paw mr-2"></i>Add Snack</button>
                <a href="/snack">
                    <button class="nav-button" type="button"><i class="fas fa-paw mr-2"></i>Cancel</button>
                </a>
            </div>
        </div>
    </form>
@endsection