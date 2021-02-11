<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        // return $test;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tanggal =  date('Y-m-d')." ";
        $menit = "19";
        $test = [];
       if($id == "temp"){
        $a = 1;
        for($i = 1;$i<=24;$i++){
            $detik = ":".random_int(10,59);
            if($i<10){
                $jam = "0".$i.":";
            }
            else if($i==24){
                $jam = "00:";
            }
            else{
                $jam = $i.":";
            }
            $date = $tanggal.$jam.$menit.$detik;
        
            if($a==23 || $a<=2 || $a==24){
                $value = random_int(22,24);
            }
            else if($a>=3 && $a<=5){
                $value = random_int(24,26);
            }
            else if($a>=6  && $a<=8){
                $value = random_int(25,27);
            }
            else if($a>=9  && $a<=10){
                $value = random_int(27,29);
            }
            else if($a>=11  && $a<=14){
                $value = random_int(29,34);
            }
            else if($a>=15  && $a<=16){
                $value = random_int(28,30);
            }
            else if($a>=17  && $a<=18){
                $value = random_int(26,27);
            }
            else if($a>=19  && $a<=20){
                $value = random_int(25,27);
            }
            else{
                $value = random_int(23,25);
            }
            $a++;
            $data = ["id_prototype"=>"1471984882","sensor"=>"temp","value"=>$value,"created_at"=>$date];
            data::create($data);
        }
       }
        else if($id == "tds"){
            $a = 1;
            $value = 1000;
        for($i = 1;$i<=24;$i++){
            $min = random_int(1,5);
            $detik = ":".random_int(10,59);
            if($i<10){
                $jam = "0".$i.":";
            }
            else if($i==24){
                $jam = "00:";
            }
            else{
                $jam = $i.":";
            }
            $date = $tanggal.$jam.$menit.$detik;
        
            if($a==23 || $a<=2 || $a==24){
                $value = $value - $min;
            }
            else if($a>=3 && $a<=5){
                $value = $value - $min;
            }
            else if($a>=6  && $a<=8){
                $value = $value - $min;
            }
            else if($a>=9  && $a<=10){
                $value = $value - $min;
            }
            else if($a>=11  && $a<=14){
                $value = $value - $min;
            }
            else if($a>=15  && $a<=16){
                $value = $value - $min;
            }
            else if($a>=17  && $a<=18){
                $value = $value - $min;
            }
            else if($a>=19  && $a<=20){
                $value = $value - $min;
            }
            else{
                $value = $value - $min;
            }
            $a++;
            $data = ["id_prototype"=>"1471984882","sensor"=>"tds","value"=>$value,"created_at"=>$date];
            data::create($data);
            }
        }
        else if($id == "wl"){
            $a = 1;
            $value = 60;
        for($i = 1;$i<=24;$i++){
            $min = random_int(1,2);
            $detik = ":".random_int(10,59);
            if($i<10){
                $jam = "0".$i.":";
            }
            else if($i==24){
                $jam = "00:";
            }
            else{
                $jam = $i.":";
            }
            $date = $tanggal.$jam.$menit.$detik;
        
            if($a==23 || $a<=2 || $a==24){
                $flipcoin = random_int(1,2);
                if($flipcoin == 1){
                  $value = $value - $min;
                }
                else{
                    $value = $value;
                }
            }
            else if($a>=3 && $a<=5){
                $flipcoin = random_int(1,2);
                if($flipcoin == 1){
                  $value = $value - $min;
                }
                else{
                    $value = $value;
                }
            }
            else if($a>=6  && $a<=8){
                $flipcoin = random_int(1,2);
                if($flipcoin == 1){
                  $value = $value - $min;
                }
                else{
                    $value = $value;
                }
            }
            else if($a>=9  && $a<=10){
                $flipcoin = random_int(1,2);
                if($flipcoin == 1){
                  $value = $value - $min;
                }
                else{
                    $value = $value;
                }
            }
            else if($a>=11  && $a<=14){
                $flipcoin = random_int(1,2);
                if($flipcoin == 1){
                  $value = $value - $min;
                }
                else{
                    $value = $value;
                }
            }
            else if($a>=15  && $a<=16){
                $flipcoin = random_int(1,2);
                if($flipcoin == 1){
                  $value = $value - $min;
                }
                else{
                    $value = $value;
                }
            }
            else if($a>=17  && $a<=18){
                $flipcoin = random_int(1,2);
                if($flipcoin == 1){
                  $value = $value - $min;
                }
                else{
                    $value = $value;
                }
            }
            else if($a>=19  && $a<=20){
                $flipcoin = random_int(1,2);
                if($flipcoin == 1){
                  $value = $value - $min;
                }
                else{
                    $value = $value;
                }
            }
            else{
                $flipcoin = random_int(1,2);
                if($flipcoin == 1){
                  $value = $value - $min;
                }
                else{
                    $value = $value;
                }
            }
            $a++;
            $data = ["id_prototype"=>"1471984882","sensor"=>"wl","value"=>$value,"created_at"=>$date];
            data::create($data);
            }
        }
        else if($id == "hum"){
            $a = 1;
            for($i = 1;$i<=24;$i++){
                $detik = ":".random_int(10,59);
                if($i<10){
                    $jam = "0".$i.":";
                }
                else if($i==24){
                    $jam = "00:";
                }
                else{
                    $jam = $i.":";
                }
                $date = $tanggal.$jam.$menit.$detik;
            
                if($a==23 || $a<=2 || $a==24){
                    $value = random_int(67,70);
                }
                else if($a>=3 && $a<=5){
                    $value = random_int(60,67);
                }
                else if($a>=6  && $a<=8){
                    $value = random_int(60,64);
                }
                else if($a>=9  && $a<=10){
                    $value = random_int(60,62);
                }
                else if($a>=11  && $a<=14){
                    $value = random_int(55,58);
                }
                else if($a>=15  && $a<=16){
                    $value = random_int(57,60);
                }
                else if($a>=17  && $a<=18){
                    $value = random_int(58,60);
                }
                else if($a>=19  && $a<=20){
                    $value = random_int(60,62);
                }
                else{
                    $value = random_int(64,66);
                }
                $a++;
                $data = ["id_prototype"=>"1471984882","sensor"=>"hum","value"=>$value,"created_at"=>$date];
                data::create($data);
            }
        }
        else{
            return "get out boy";
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

    public function statistik($id,$status,$sensor){
        $data = [];
        $label = [];
        $daily = [];
        $weekly = [];
        $tanggal =  date('Y-m-d')." ";
        $temp = "";
        if($status=="today"){
            $temp =  data::where('sensor',$sensor)->where('id_prototype',$id)->whereRaw('date_format(created_at,"%Y-%m-%d")=curdate()')->paginate(8);
            $i = 1;
            foreach($temp as $t){
                $value = intval($t->value);
                array_push($data,$value);
                array_push($label,$i);
                $i ++;
            }
            return $temp;
        }
        else if($status=="daily"){
            for($a=1;$a<=7;$a++){
                $data = [];
                for($i = 1;$i<=24;$i++){
                    $value = random_int(25,30);
                    array_push($data,$value);
                }
                $avg = round(array_sum($data)/24);
                array_push($daily,$avg);
                array_push($label,$a);
            }
            $data = $daily;
            // return $data;
            return $temp;
        }
        else if($status=="weekly"){
            for($b=1;$b<=4;$b++){
                $daily = [];
                for($a=1;$a<=7;$a++){
                    $data = [];
                    for($i = 1;$i<=24;$i++){
                        $value = random_int(25,30);
                        array_push($data,$value);
                    }
                    $avg = round(array_sum($data)/24);
                    array_push($daily,$avg);
                }
                $week = round(array_sum($daily)/7);
                array_push($weekly,$week);
                array_push($label,$b);
            }

            $data = $weekly;
            return view('hidroponik.chart',compact('data','label'));
        }
        else{
       
            for($i = 1;$i<=24;$i++){
                $value = random_int(25,30);
                array_push($data,$value);
                array_push($label,$i);
            }
            return view('hidroponik.chart',compact('data','label'));
        }
    }
}
