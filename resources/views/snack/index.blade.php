@extends('layouts.app')

@section ('sidebar')
    <div class="flex justify-between m-3">
        <div class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="/add_snack">Add New snack</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="m-3">
        @include('_snack')
    </div>

    <span class="flex justify-center">
    {{ $snack->links() }}
    </span>
@endsection

