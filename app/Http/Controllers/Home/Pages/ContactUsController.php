<?php

namespace App\Http\Controllers\Home\Pages;

use App\Http\Controllers\Controller;
use App\Mail\ContactUs;
use App\Mail\RestartPassword;
use Illuminate\Http\Request;
use Illuminate\Http\ResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller{
    use ResponseTrait;
    protected $_path = 'public.app.pages.contact-us.';

    public function contactUs(){
        return view($this->_path . 'contact-us', [
            'user' => (Auth::check()) ? Auth::user() : null
        ]);
    }
    public function sendAMessage(Request $request){
        try{
            Mail::to(env('EMAIL'))->send(new ContactUs($request->name, $request->email, $request->phone, $request->message));

            /* Send copy to user also */
            Mail::to($request->email)->send(new ContactUs($request->name, $request->email, $request->phone, $request->message));

            return $this::success('', __('Vaša poruka je uspješno poslana!'));
        }catch (\Exception $e){
            dd($e);
        }
    }
}
