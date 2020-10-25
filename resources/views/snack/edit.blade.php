@extends ('layouts.app')

@section ('sidebar')

    <div class="text-4xl mb-8">
        <h1>Edit {{ $snack->name }}</h1>
    </div>

@endsection

@section ('content')

    <form method="post" action="{{ $snack -> path }}">
        @method ('PATCH')

        @csrf

        <div class="flex flex-wrap">
            <div class="w-1/2">
                <label class="block" for="name">
                    Snack's Name
                </label>

                <input class="block w-2/5 @error ('name') border border-red-500 @enderror"
                       type="text" name="name" data-lpignore="true"
                       autocomplete="off" value="{{ $snack->name }}" />

                @error ('name')
                <div class="alert-message">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="w-1/2">
                <label class="block" for="owner">
                    Current Popularity
                </label>
                <input class="block w-1/5 @error ('popularity') border border-red-500 @enderror"
                       type="text" name="popularity" data-lpignore="true"
                       autocomplete="off" value="{{ $snack->popularity }}" />

                @error ('popularity')
                <div class="alert-message">
                    {{ $message }}
                </div>
                @enderror

            </div>

        </div>


        <div class="flex flex-wrap">
            <div class="w-full">
                <label class="block" for="description">Details</label>
                <textarea class="block w-8/12" rows="8"
                          name="description">{{ $snack->description }}</textarea>
            </div>
        </div>

        <div class="flex flex-wrap mt-8">
            <div class="w-full">
                <button class="nav-button" type="submit"><i class="fas fa-paw mr-2"></i>Update Dog</button>
                <a href="/">
                    <button class="nav-button" type="button"><i class="fas fa-paw mr-2"></i>Cancel</button>
                </a>
            </div>
        </div>

    </form>

@endsection
