<?php

namespace App\Http\Controllers;
use App\Models\Reklam;
use App\Models\User;
use Auth;

use Illuminate\Http\Request;

class ReklamlarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $reklamlar=Reklam::get();
        foreach ($reklamlar as $reklam){
            $bakiye = User::where('id', $reklam->user_id)->first()->bakiye;
            if($reklam->maliyet<=$bakiye)
            {
                if($reklam->gunluk_limit>=1){
                    Reklam::where('id',$reklam->id)->update(array('durum'=>'aktif'));
                }
                else{
                    if($reklam->durum =='aktif'){
                        Reklam::where('id',$reklam->id)->update(array('durum'=>'pasif'));
                        //Mail :: Günlük Limit bitti.
                    }
                }

            }
            else{
                if($reklam->durum =='aktif'){
                    Reklam::where('id',$reklam->id)->update(array('durum'=>'pasif'));
                    //Mail :: Bakiye Yüklemesi yapılması gerekiyor.
                }
            }
        }

        $reklamlar=Reklam::where('durum','=','aktif')->orderBy('maliyet', 'desc')->orderBy('created_at', 'asc')->get();
        $ben = Auth::user();
        $idm=$ben->id;
        $bakiyem=$ben->bakiye;

        return view('tum.list',compact('reklamlar','bakiyem'));
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
        $ben = Auth::user();
        $idm=$ben->id;
        $bakiyem=$ben->bakiye;
        $reklam=Reklam::find($id);

        if($reklam->user_id == $idm){
            return redirect()->route('hepsi.index')->withErrors('Kendi reklamına tıklayamazsın.');
        }
        else{

            if($reklam->durum=='aktif'){

                return view('tum.reklam',compact('reklam','bakiyem'));
                }
            else{
                return redirect()->route('hepsi.index')->withErrors('Reklam yayından kaldırıldığı için görüntülenemiyor.');
            }

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
        $ben = Auth::user();
        $idm=$ben->id;
        $bakiyem=$ben->bakiye;
        $reklam=Reklam::find($id);

        if($reklam->user_id == $idm){
            return redirect()->route('hepsi.index')->withErrors('Kendi reklamından kazanç sağlayamazsın.');
        }
        else{
            $reklamsahibi=User::find($reklam->user_id);
            $bakiyesi=$reklamsahibi->bakiye;
            $sonbakiye=$bakiyesi-$reklam->maliyet;
            $sonbakiyem=$bakiyem+$reklam->maliyet;
            $gunluklimit=$reklam->gunluk_limit;
            $gunluklimit=$gunluklimit-1;

            if($sonbakiye>=0 && $gunluklimit>-1){
                $reklam->update(array('gunluk_limit' => $gunluklimit));
                $reklamsahibi->update(array('bakiye' => $sonbakiye));
                $ben->update(array('bakiye' => $sonbakiyem));

                return redirect()->route('hepsi.index')->withSuccess('Reklamdan ödeme alındı.');
                }
            else{
                return redirect()->route('hepsi.index')->withErrors('Reklam yayından kaldırıldığı için ödeme alamazsınız.');
            }
        }
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
