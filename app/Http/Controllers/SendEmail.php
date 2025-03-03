<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\TestSendingEmail;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    public function index()
    {
        $user = User::all();
        Mail::to('budi@gmail.com')->send(new TestSendingEmail($user));
    }
}
