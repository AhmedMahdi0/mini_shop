<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MailRequest;
use App\Jobs\SendUserEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        return view('email.send-view');
    }

    public function store(MailRequest $request)
    {
//        $request->validated();

        $email = $request->email;
        $user = User::where("email", $email)->first();
        $message = "email not found";
        if ($user != null) {
            $message = "email was send";
            sendWelcomeEmail($user);
        }
        return back()->with("message", $message);
    }
}
