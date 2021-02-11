<?php

namespace App\Http\Controllers;
use App\account;
use App\data;
use Illuminate\Http\Request;
use App\Http\Resources\Login as res;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $akun = account::where("email",$request->email)->get();
        if($akun->count()>=1){
            return ["email"=>"This Account Already Exist!!"];
        }
        $data = ["full_name"=>$request->full_name,
        "phone_number"=>$request->phone_number,
        "email"=>$request->email,
        "address"=>$request->address,
        "password"=>$request->password,
        "token"=>$request->token
        ];
        account::create($data);
        $akun = account::where("email",$request->email)->get();
        $akun = $akun[0];
        return $akun;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = account::where("email",$id)->get();
        if(count($data)>=1){
        $data = $data[0];
        return $data;
        }
        else{
            return ["email"=>"There is no account with this email"];
        }
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
      try {
        $data = ["token"=>$request->token];
        account::find($id)->update($data);
        return ["message"=>"Berhasil update Token ID ".$id];
      } catch (\Throwable $th) {
        return ["message"=>"Gagal : ".$request->token];
      }
  
     
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
