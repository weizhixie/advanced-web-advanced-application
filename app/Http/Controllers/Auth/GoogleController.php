<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        try
        {
            $user = User::query()
                ->where('email', $googleUser->getEmail())
                ->where('google_id', $googleUser->getId())
                ->firstOrFail();
        }
        catch (ModelNotFoundException $exception)
        {
            try
            {
                $user = User::query()->where('email', $googleUser->getEmail())->firstOrFail();
                $user->update(['google_id' => $googleUser->getId()]);
            }
            catch (ModelNotFoundException $exception)
            {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make(Str::random(32)),
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => now(),
                ]);
                app(MailController::class)->welcomeMessage($googleUser->getEmail());

                //Send verification mail on socialite login
                event(new Registered($user));
            }
        }

        Auth::login($user);

        return redirect()->route('index');
    }
}
