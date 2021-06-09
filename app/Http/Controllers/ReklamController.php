<?php

namespace App\Http\Controllers;

use App\Models\Reklam;
use Illuminate\Http\Request;
use Auth;

class ReklamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $id=$user->id;
        $bakiye=$user->bakiye;
        $reklamlar=Reklam::where('user_id','=',$id)->get();
        foreach ($reklamlar as $reklam){
            if($reklam->maliyet<=$bakiye)
            {
                if($reklam->gunluk_limit>=1){
                    Reklam::where('id',$reklam->id)->update(array('durum'=>'aktif'));
                }
                else{
                    Reklam::where('id',$reklam->id)->update(array('durum'=>'pasif'));
                }

            }
            else{
                Reklam::where('id',$reklam->id)->update(array('durum'=>'pasif'));
            }
        }
        $reklamlar=Reklam::where('user_id','=',$id)->get();

        return view('benim.list',compact('reklamlar','bakiye'));
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
