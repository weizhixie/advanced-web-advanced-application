@extends ('layouts.app')

@section ('sidebar')
    <div class="self-center flex-1 text-black-500 text-center px-4 py-2 m-3 text-4xl ">
        Edit: {{ $snack->name }}
    </div>

@endsection

@section ('content')
    <form method="post" action="{{ $snack -> path }}">
        @method ('PATCH')

        @csrf

        <div class="self-center text-center">
            <div class="a-section m-3">
                <label class="block" for="name">Snack's Name:</label>

                <input class="w-3/12 px-4 py-2 @error ('name') border border-red-500 @enderror"
                       type="text" name="name" data-lpignore="true"
                       autocomplete="off" value="{{ $snack->name }}" />

                @error ('name')
                <div class="alert-message text-red-500">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="a-section m-3">
                <label class="block" for="popularity">Current Popularity</label>

                <input class="w-3/12 px-4 py-2 @error ('popularity') border border-red-500 @enderror"
                       type="text" name="popularity" data-lpignore="true"
                       autocomplete="off" value="{{ $snack->popularity }}" />

                @error ('popularity')
                <div class="alert-message text-red-500">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="a-section m-3">
                <label class="block" for="description">Details</label>
                <textarea class="w-3/12 px-4 py-2" rows="8"
                          name="description">{{ $snack->description }}</textarea>
            </div>



            <div class="a-section m-3">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit">
                    Update Snack</button>
                <a href="/">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button">
                        Cancel</button>
                </a>
            </div>

        </div>

    </form>

@endsection
