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
    public function indexEnd()
    {
        return view('eng.home');
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
