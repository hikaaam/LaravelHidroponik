<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\notification;
use App\Mail\Notif;
use Illuminate\Support\Facades\Mail;
use App\prototype;
use App\account;
use App\Http\Resources\Mobile as mobile;
class MobileNotificationController extends Controller
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
        return $request;
       $isi = $request->isi; 
       $p = $request->id_prototype;
       $stat = $request->status;
       $proto = prototype::where("prototype_id",$p)->get();
       $proto = $proto[0];
        $users = account::find($proto->user_id);
       $target = $users->email;
       $id = $request->id_user;
           $check = notification::whereRaw("id_user = '".$id."' and
            id_prototype ='".$p."' and status = '".$stat."' and (now()-created_at)<10000  ")->count();
            $data=["isi"=>$isi,"id_user"=>$id,"id_prototype"=>$p,"status"=>$stat];
            if($check<1){
                try {
                    //code...
                    notification::create($data);
                    Mail::to($target)->Send(new Notif($data));
                } catch (\Throwable $th) {
                    return $th;
                }   
                
            }
            return ["check"=>$check];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = notification::where("id_user",$id)->groupBy("created_at")->orderBy("id","desc")->get();
        return $data;
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
    public function notif($id,$status,$isi){
            // return ["id"=>$id,"status"=>$status,"isi"=>$isi];
            $p = $id;
            $stat = $status;
            $proto = prototype::where("prototype_id",$p)->get();
            // return $proto;
            $proto = $proto[0];
            $users = account::find($proto->user_id);
            // return $users;
            $target = $users->email;
            $id = $users->id;
                $check = notification::whereRaw("id_user = '".$id."' and
                id_prototype ='".$p."' and status = '".$stat."' and (now()-created_at)<10000  ")->count();
                $data=["isi"=>$isi,"id_user"=>$id,"id_prototype"=>$p,"status"=>$stat];
                // return $check;
                if($check<1){
                    try {
                        //code...
                        Mail::to($target)->Send(new Notif($data));
                        notification::create($data);
                    } catch (\Throwable $th) {
                        return $th;
                    }   
                    
                }
                return ["check"=>$check];
        }
}
