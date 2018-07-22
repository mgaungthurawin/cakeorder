<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;
use Flash;


class MailController extends Controller
{
    public function send(Request $request) {
    	$data = $request->all();
    	$contact = $data['contact'];

    	$obj = new \stdClass();
        $obj->sender = $contact['name'];
        $obj->receiver = 'Nyo Lay Htike';
        $obj->message = $contact['body'];
 
        Mail::to("aung.thura@gogames.co")->send(new ContactEmail($obj));

        Flash::success('successfully send the email');
        return redirect('/contact');

    }
}
