<?php

namespace App\Http\Controllers;

use App\mobileAuth;
use App\account;
use App\prototype;
use Illuminate\Http\Request;
use App\Mail\otpEmails;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\Mobile as mobile;

class MobileAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = account::paginate(3);
        return mobile::collection($data);
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
       
            $target = $request['email'];
            $otp = random_int(10000,99999);
            $data = ['data'=>$otp];
                try {
                    //code...
                    Mail::to($target)->Send(new otpEmails($data));
                    return $otp;
                } catch (\Throwable $th) {
                return "error";
                }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mobileAuth  $mobileAuth
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = prototype::where('user_id',$id)->where('status',0)->get();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mobileAuth  $mobileAuth
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
     * @param  \App\mobileAuth  $mobileAuth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->has('password')){
            $data=["password"=>$request->newPassword];
            account::find($id)->update($data);
            return account::find($id);
        }
        else{
        $data = ["full_name"=>$request->full_name,"phone_number"=>$request->phone,
        "address"=>$request->address,"email"=>$request->email];
        account::find($id)->update($data);
        return account::find($id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mobileAuth  $mobileAuth
     * @return \Illuminate\Http\Response
     */
    public function destroy(mobileAuth $mobileAuth)
    {
        //
    }
}
