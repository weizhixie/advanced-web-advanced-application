@extends('layouts.app')

@section ('sidebar')
    <div class="flex justify-between m-3">
        <div class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="/">Home</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="flex m-3">
        <div class="w-1/2 text-xl bg-blue-100 px-4 py-4 border rounded border-gray-500">
            <h2 class="font-bold mb-4">
                Snack Details:
            </h2>
            <p class="mb-2">
                Name: {{ $snack -> name }}
            </p>
            <p class="mb-4">
                Popularity: {{ $snack -> popularity }}
            </p>
            <h2 class="font-bold mb-4">
                Snack description:
            </h2>
            {{ $snack -> description }}
            <h2 class="font-bold mb-4">
                Snack Image:
            </h2>
            @if(is_null($snack->snackImage) )
                <img src="https://images.squarespace-cdn.com/content/v1/56c7a435f850827f409acdf7/1481844308759-V19M8Y0K8C7W0MMEMEFU/ke17ZwdGBToddI8pDm48kKXCml56unlbyP9EmZUaFWdZw-zPPgdn4jUwVcJE1ZvWQUxwkmyExglNqGp0IvTJZUJFbgE-7XRK3dMEBRBhUpwAoL0HpMvt-aUJwb8G9GlCLJEIDcroVSsalC8-PN33UeNTumcscIOppXcINos6j8M/image-asset.jpeg?format=1000w">
            @else
                <img src="{{ asset('/storage/images/'.$snack->snackImage) }}">
            @endif
        </div>
    </div>
@endsection