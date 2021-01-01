@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
        <div class="flex">
            <div class="w-full">
                <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                    <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                        {{ __('Change Password') }}
                    </header>

                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('user-password.update') }}">
                        @csrf
                        @method('PUT')



                        @if(session('status')  == "password-updated")
                            <div class="alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300">
                                <div class="alert-title font-semibold text-lg text-green-800">
                                    Password updated successfully
                                </div>
                            </div>
                        @endif
                        <div class="flex flex-wrap">
                            <label for="current_password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Current Password') }}:
                            </label>

                            <input id="current_password" type="password"
                                   class="form-input w-full @error('current_password', 'updatePassword') border-red-500 @enderror" name="current_password" required autofocus>

                            @error('current_password', 'updatePassword')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Password') }}:
                            </label>

                            <input id="password" type="password"
                                   class="form-input w-full @error('password', 'updatePassword') border-red-500 @enderror" name="password"
                                   required autocomplete="new-password">

                            @error('password', 'updatePassword')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Confirm Password') }}:
                            </label>

                            <input id="password-confirm" type="password" class="form-input w-full"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="flex flex-wrap pb-8 sm:pb-10">
                            <button type="submit"
                                    class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>

                </section>
            </div>
        </div>
    </main>
@endsection
