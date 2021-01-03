<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Auth\Events\Registered;

class GithubController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $githubUser = Socialite::driver('github')->user();
        try
        {
            $user = User::query()
                ->where('email', $githubUser->getEmail())
                ->where('github_id', $githubUser->getId())
                ->firstOrFail();
        }
        catch (ModelNotFoundException $exception)
        {
            try
            {
                $user = User::query()->where('email', $githubUser->getEmail())->firstOrFail();
                $user->update(['github_id' => $githubUser->getId()]);
            }
            catch (ModelNotFoundException $exception)
            {
                //TODO add exception for github user who with nickname only and hasn't fill their name on github
                $user = User::create([
                    'name' => $githubUser->getName(),
                    'email' => $githubUser->getEmail(),
                    'password' => Hash::make(Str::random(32)),
                    'github_id' => $githubUser->getId(),
                    'email_verified_at' => now(),
                ]);

                app(MailController::class)->welcomeMessage($githubUser->getEmail());

                //Send verification mail on socialite login
                event(new Registered($user));

            }
        }

        Auth::login($user);

        return redirect()->route('index');
    }


}
