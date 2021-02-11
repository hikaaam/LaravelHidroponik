<?php

namespace App\Http\Controllers;

use App\prototype;
use App\account;
use Session;
use Illuminate\Http\Request;

class PrototypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('id')){
        $id = Session::get('id')[0];
        }
        else{
            return "404 Error";
        }
        $decryptedId = decrypt($id);
        $account = account::find($decryptedId);
        // return $account;
        $data = prototype::where('user_id',$decryptedId)->where('status','0')->get();
      
        return view('hidroponik.prototype.index',compact('data','account'));
        
    
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
        if(Session::has('id')){
            $id = Session::get('id')[0];
            }
        else{
            return "404 Error";
        }
        $decryptedId = decrypt($id);
        $account = account::find($decryptedId);
   
        function shuffle(){
         $prototypeId = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 12);
        $check = prototype::where('prototype_id',$prototypeId)->get();
        if(count($check)>0){
            shuffle();
        }
        else{
            return $prototypeId;
        }
         }
       
        $data = ['prototype_id'=>shuffle(),
                'user_id'=>$decryptedId ];
        prototype::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\prototype  $prototype
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('hidroponik.prototype.prototype',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\prototype  $prototype
     * @return \Illuminate\Http\Response
     */
    public function edit(prototype $prototype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\prototype  $prototype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prototype $prototype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\prototype  $prototype
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        prototype::where('prototype_id',$id)->update(['status'=>'1']);
        return redirect()->back();
    }
}
