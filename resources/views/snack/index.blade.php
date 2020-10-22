@extends('layouts.app')

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