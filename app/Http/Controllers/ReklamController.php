<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReklamCreateRequest;
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
        $reklamlar=Reklam::where('user_id','=',$id)->orderBy('maliyet', 'desc')->orderBy('created_at', 'asc')->get();

        return view('benim.list',compact('reklamlar','bakiye'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('benim.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReklamCreateRequest $request)
    {
        $user = Auth::user();
        $id=$user->id;
        $bakiye=$user->bakiye;

        $reklam=new Reklam;
        $reklam->baslik=$request->baslik;
        $reklam->aciklama=$request->aciklama;
        $reklam->siteurl=$request->siteurl;
        $reklam->maliyet=$request->maliyet;
        $reklam->gunluk_limit=$request->gunluk_limit;
        $reklam->user_id=$id;
        if($request->maliyet<=$bakiye){
            if($request->gunluk_limit>0){
                $reklam->durum='aktif';
            }
            else{
                $reklam->durum='pasif';
            }
        }
        else{
            $reklam->durum='pasif';
        }

        $reklam->save();
        return redirect()->route('benim.index')->withSuccess('Reklam Kaydı Başarı ile Oluşturuldu.');

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
        $ben = Auth::user();
        $idm=$ben->id;

        $reklam=Reklam::find($id) ?? abort(404,'Task Not Found');


        if($reklam->user_id==$idm){
            $reklam->delete();
            return redirect()->route('benim.index')->withSuccess('Reklam Kaldırma İşlemi Başarılı.');
        }
        else{
            return redirect()->route('benim.index')->withErrors('Reklam Bulunamadı.');
        }

    }
}
