@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
        <div class="flex">
            <div class="w-full">
                <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                    <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                        {{ __('Write review') }}
                    </header>

                    @if(session()->has('message'))
                        <div class="alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300">
                            <div class="alert-title font-semibold text-lg text-green-800">
                                {{ session()->get('message') }}
                            </div>
                        </div>
                    @endif

                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ $snack->path}}/writeReview">
                        @csrf

                        <div class="flex flex-wrap">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Title') }}:
                            </label>
                            <input id="title" type="title" class="form-input w-full @error('title') border-red-500 @enderror" name="title" placeholder="title" required>
                            @error('title')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="review" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Review') }}:
                            </label>
                            <textarea class="form-input w-full @error ('review') border border-red-500 @enderror"
                                      rows="8" name="review" placeholder="talk about the snack"></textarea>
                            @error('review')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="rating" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Rating') }}:
                            </label>
                        </div>

                        @error('rating')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror

                        <div class="wrapper">
                            <input class="radioBtn" type="radio" id="r1" name="rating" value="5">
                            <label for="r1">&#10038;</label>
                            <input class="radioBtn" type="radio" id="r2" name="rating" value="4">
                            <label for="r2">&#10038;</label>
                            <input class="radioBtn" type="radio" id="r3" name="rating" value="3">
                            <label for="r3">&#10038;</label>
                            <input class="radioBtn" type="radio" id="r4" name="rating" value="2">
                            <label for="r4">&#10038;</label>
                            <input class="radioBtn" type="radio" id="r5" name="rating" value="1">
                            <label for="r5">&#10038;</label>
                        </div>

                        <div class="flex flex-wrap pb-8 sm:pb-10">
                            <button type="submit"
                                    class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                {{ __('Submit') }}
                            </button>
                        </div>

                        <a href="{{ $snack->path }}">
                            <button class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4" type="button">
                                Close
                            </button>
                        </a>
                    </form>
                </section>
            </div>
        </div>
    </main>
@endsection

<style>
    .wrapper {
        display: inline-block;
    }
    .wrapper * {
        float: right;
    }
    input.radioBtn {
        display: none;
    }
    label {
        font-size: 30px;
    }

    input:checked ~ label {
        color: yellow;
    }

    label:hover,
    label:hover ~ label {
        color: yellow;
    }


    input:checked ~ label:hover,
    input:checked ~ label:hover ~ label {
        color: lime !important;
    }
</style>

