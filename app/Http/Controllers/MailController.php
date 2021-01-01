<?php

namespace App\Http\Controllers;

use App\Mail\SnackShopEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function welcomeMessage(String $userEmail)
    {
        Mail::to($userEmail)->send(new SnackShopEmail());
    }
}
