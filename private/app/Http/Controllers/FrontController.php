<?php

namespace App\Http\Controllers;

use App\front;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hidroponik.index');
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
     * @param  \App\front  $front
     * @return \Illuminate\Http\Response
     */
    public function show(front $front)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\front  $front
     * @return \Illuminate\Http\Response
     */
    public function edit(front $front)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\front  $front
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, front $front)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\front  $front
     * @return \Illuminate\Http\Response
     */
    public function destroy(front $front)
    {
        //
    }
}
