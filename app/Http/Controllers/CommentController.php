<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;
use Auth;
use DB;
use App\Comment;
use Validator;
use DateTime;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments = Comment::all()->reverse();
        return view('comments/comments', compact('comments'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $response["success"] = false;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
//            return response()->json(['errors'=>$validator->errors()->all()]);
            //return json_encode(['errors'=>$validator->errors()->all()]);
            return json_encode(['error'=>"true"]);
            //return withErrors($validator)->withInput();
        }

        $datePersian = getPersianDateWithMonthName(date("Y", time())."-".date("m", time())."-".date("d", time()));
        $insert = Comment::create(['name'=>$request->name, 'email'=>$request->email, 'comment'=>$request->comment, "date_persian"=>$datePersian]);

        $comments = Comment::all()->reverse();

        return json_encode($comments);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
