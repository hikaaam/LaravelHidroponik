<?php

namespace App\Http\Controllers;

use App\prototype;
use App\account;
use Illuminate\Http\Request;
use App\Http\Resources\prototype as api;

class MobilePrototypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = prototype::where()

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
        $id = $request->id;
        $pid = $request->pid;
        // function shuffle(){
        //     $prototypeId =  substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 12);
        // //    $check = prototype::where('prototype_id',$prototypeId)->get();
        // //    if(count($check)>0){
        // //        shuffle();
        // //    }
        // //    else{
        // //        return $prototypeId;
        // //    }
        //     }
          
           $data = [
               'prototype_id'=>$pid,
               'user_id'=>$id,
               'nama'=>$request->nama
                 ];
           prototype::create($data);
        //    return "shuffle();";
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = prototype::where('user_id',$id)->where('status',0)->orderBy('id','desc')->get();

        return api::collection($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = prototype::where('prototype_id',$id)->get();

        return api::collection($data);
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
        $data=["password"=>$request->newPassword];
        account::where('email',$id)->update($data);
        return account::where('email',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        prototype::where('prototype_id',$id)->delete();
    }
}
