@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">
            <ul>
            @foreach($snack as $s)
                <li>
                    <a href="{{ $s->path }}">{{$s->name}}</a>
                </li>
            @endforeach
            </ul>
        </div>
    </main>
@endsection