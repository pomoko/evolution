<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function preface()
    {
        return view('info.preface.preface');
    }

    public function contents()
    {
        return view('info.contents.contents');
    }

    public function articles()
    {
        return view('info.articles.articles');
    }



}
