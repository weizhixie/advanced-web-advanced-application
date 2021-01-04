@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Two Factor Authentication
                </header>

                <form method="POST" action="/user/two-factor-authentication ">
                    @csrf

                    @if(auth()->user()->two_factor_secret)
                        @method('DELETE')

                        <div class="p-5">
                            {!!  auth()->user()->twoFactorQrCodeSvg() !!}
                        </div>

                        <div>
                            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                                Recovery Codes:
                            </header>

                            <ul>
                                @foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                                    <li class="border list-none rounded-sm px-3 py-3" style='border-bottom-width:0'>
                                        {{ $code }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Disable</button>
                    @else
                        <button class="p-5 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Enable</button>
                    @endif
                </form>
            </section>
        </div>
    </main>
@endsection