<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;

use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * To send email to users
     * @return View email
     */
    public function create()
    {
        return view('email');
    }
    /**
     * To send email to user
     *  @param MailRequest $request Request for Mail
     * @return View book list
     */
    public function sendEmail(MailRequest $request)
    {
        $request->validated();

        $data = [
            'subject' => $request['subject'],
            'email' => $request['email'],
            'content' => $request['content']
        ];

        Mail::send('email-template', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject']);
        });

        return redirect()->route('booklist')->with(['message' => 'Email successfully sent!']);
    }
}
