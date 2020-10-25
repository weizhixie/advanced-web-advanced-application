@extends('layouts.app')

@section ('sidebar')
    <div class="flex justify-between">
        <div class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="/add_snack">Add New snack</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="flex flex-wrap">
        @foreach ($snack as $s)
            <!--<a href="{{ $s->path }}">{{$s->name}}</a>-->
            <div class="w-1/3 pr-2">
                @include ('_snack')
            </div>
        @endforeach
    </div>

    {{ $snack->links() }}
@endsection