@extends ('layouts.app')

@section ('sidebar')
    <div class="self-center flex-1 text-black-500 text-center px-4 py-2 m-3 text-4xl ">
        Edit: {{ $snack->name }}
    </div>
@endsection

@section ('content')
    <form method="post" action="{{ $snack -> path }}" enctype="multipart/form-data">
        @method ('PATCH')
        @csrf
        <div class="self-center text-center">
            <div class="a-section m-3">
                <label class="block" for="name">Snack's Name:</label>
                <input class="w-3/12 px-4 py-2 @error ('name') border border-red-500 @enderror"
                       type="text" name="name" data-lpignore="true" autocomplete="off" value="{{ $snack->name }}" />
                @error ('name')
                <div class="alert-message text-red-500">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="a-section m-3">
                <label class="block" for="popularity">Current Popularity</label>
                <input class="w-3/12 px-4 py-2 @error ('popularity') border border-red-500 @enderror"
                       type="text" name="popularity" data-lpignore="true" autocomplete="off" value="{{ $snack->popularity }}" />
                @error ('popularity')
                <div class="alert-message text-red-500">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="a-section m-3">
                <label class="block" for="description">Description</label>
                <textarea class="w-3/12 px-4 py-2 @error ('description') border border-red-500 @enderror"
                          rows="8" name="description">{{ $snack->description }}</textarea>
                @error ('description')
                <div class="alert-message text-red-500">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="a-section m-3">
                <label class="block" for="snackImage">Snack image:</label>

                @if(is_null($snack->snackImage) )
                    <img class="mx-auto" src="https://images.squarespace-cdn.com/content/v1/56c7a435f850827f409acdf7/1481844308759-V19M8Y0K8C7W0MMEMEFU/ke17ZwdGBToddI8pDm48kKXCml56unlbyP9EmZUaFWdZw-zPPgdn4jUwVcJE1ZvWQUxwkmyExglNqGp0IvTJZUJFbgE-7XRK3dMEBRBhUpwAoL0HpMvt-aUJwb8G9GlCLJEIDcroVSsalC8-PN33UeNTumcscIOppXcINos6j8M/image-asset.jpeg?format=1000w">
                @else
                    <img class="mx-auto" src="{{ asset('/storage/images/'.$snack->snackImage) }}">
                @endif

                <input class="w-3/12 px-4 py-2 @error ('snackImage') border border-red-500 @enderror"
                       type="file" name="snackImage">
                @error ('snackImage')
                <div class="alert-message text-red-500">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="a-section m-3">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit">Update Snack</button>
                <a href="/">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button">Cancel</button>
                </a>
            </div>
        </div>
    </form>
@endsection
