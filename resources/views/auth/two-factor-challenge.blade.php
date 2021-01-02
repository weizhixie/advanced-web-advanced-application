@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
        <div class="flex">
            <div class="w-full">
                <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                    <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                        {{ __('Two Factor Challenge') }}
                    </header>

                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('two-factor.login') }}">
                        @csrf

                        <p class="leading-normal text-gray-500">
                            {{ __('Please enter your authentication code to login.') }}
                        </p>

                        <div class="flex flex-wrap">
                            <label for="code" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Code') }}:
                            </label>

                            <input id="code" type="code"
                                   class="form-input w-full @error('code') border-red-500 @enderror" name="code" required>

                            @error('code')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap justify-center items-center space-y-6 pb-6 sm:pb-10 sm:space-y-0 sm:justify-between">
                            <button type="submit"
                                    class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:w-auto sm:px-4 sm:order-1">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </form>
                </section>


                <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                    <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                        {{ __('Two Factor Recovery Code') }}
                    </header>

                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('two-factor.login') }}">
                        @csrf

                        <p class="leading-normal text-gray-500">
                            {{ __('Please enter your recovery code to login.') }}
                        </p>

                        <div class="flex flex-wrap">
                            <label for="recovery_code" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Recovery Code') }}:
                            </label>

                            <input id="recovery_code" type="recovery_code"
                                   class="form-input w-full @error('recovery_code') border-red-500 @enderror" name="recovery_code" required>

                            @error('recovery_code')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap justify-center items-center space-y-6 pb-6 sm:pb-10 sm:space-y-0 sm:justify-between">
                            <button type="submit"
                                    class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:w-auto sm:px-4 sm:order-1">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </main>
@endsection