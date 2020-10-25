@extends('layouts.app')

@section ('sidebar')
    <div class="flex justify-between">
        <div class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="/">Home</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="flex">
        <div class="w-1/2 text-xl bg-blue-100 px-4 py-4 border rounded border-gray-500">
            <h2 class="font-bold mb-4">
                Snack Details
            </h2>
            <p class="mb-2">
                Name: {{ $snack -> name }}
            </p>
            <p class="mb-4">
                Popularity: {{ $snack -> popularity }}
            </p>
            <h2 class="font-bold mb-4">
                Snack description
            </h2>
            {{ $snack -> description }}
        </div>
    </div>
@endsection