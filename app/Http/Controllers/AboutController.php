<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;

use App\Http\Requests;
use Validator;

class AboutController extends Controller
{
    public function create()
    {
        return view('about.contact');
    }

    public function store(ContactFormRequest $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',

        ]);


        \Mail::send('emails.contact',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message)
            {
                $message->from('info@bowtiesoft.com');
                $message->to('info@bowtiesoft.com', 'Bowtie Software & Web Development')->subject('TODOParrot Feedback');
            });




        return \Redirect::route('contact')
            ->with('message', 'Thanks for contacting us!');

    }
}
