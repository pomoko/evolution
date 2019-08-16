<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }        
    public function indexEng()
    {
        return view('eng.home');
    }    

    public function contact()
    {
        return view('contact/contact');
    }

    public function contactEng()
    {
        return view('eng/contact/contact');
    }

    public function sendMail(Request $request)
    {
         // $this->validate($request, [
         //  'name'     =>  'required',
         //  'email'  =>  'required|email',
         //  'message' =>  'required',
         //  'file' => 'mimes:jpg,jpeg,png,pdf |max:4096'
         // ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'file' => 'mimes:jpg,jpeg,png,pdf |max:4096'
        ]);

        if ($validator->fails()) {
//            return response()->json(['errors'=>$validator->errors()->all()]);
            //return json_encode(['errors'=>$validator->errors()->all()]);
            return back()->withInput()->withErrors($validator);
        }

        $data = array(
            'name'      =>  $request->name,
            'email'      =>  $request->email,
            'subject'      =>  $request->subject,
            'message'   =>   $request->message,
            'file'  => $request->file('file')
        );



        $successMsg = 'از تماس شما سپاسگزاریم!';
        if($request->lang == "en"){
            $successMsg = "Thanks For Contacting Us!";
        }


         Mail::to("info@symphonyofevolution.com")->send(new SendMail($data));

         return back()->with('success', $successMsg);

    }
    public function reviews()
    {
        return view('reviews.reviews');
    }   

    public function reviewsEng()
    {
        return view('eng.reviews.reviews');
    }
    public function preface()
    {
        return view('info.preface.preface');
    }   

    public function prefaceEng()
    {
        return view('eng.info.preface.preface');
    }

    public function contents()
    {
        return view('info.contents.contents');
    }

    public function contentsEng()
    {
        return view('eng.info.contents.contents');
    }

    public function articles()
    {
        return view('info.articles.articles');
    }

    public function articlesEng()
    {
        return view('eng.info.articles.articles');
    }

    public function bookInfo()
    {
        return view('info.bookInfo.bookInfo');
    }

    public function bookInfoEng()
    {
        return view('eng.info.bookInfo.bookInfo');
    }



}
