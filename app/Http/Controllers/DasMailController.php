<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Message;

class DasMailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'ini email guys',
            'body' => 'halo rakyat jelataku.'
        ];

        Mail::to('achrizal15@gmail.com','husnulalfaini3@gmail.com')->send(new Message($mailData));

        dd("Email terkirim.");
    }
}
