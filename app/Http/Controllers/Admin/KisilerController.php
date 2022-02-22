<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ZimmetController;
use Illuminate\Http\Request;
use App\Models\Kisiler;
use App\Models\Kadrolar;
use App\Models\Envanter;
use App\Http\Requests\KisiCreateRequest;
use App\Http\Requests\KisiUpdateRequest;
use App\Http\Requests\ZimmetUpdateRequest;

class KisilerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function yonetimkadrogoster()
    {
        $kisisay=Kisiler::where('kadro','yonetim')->count();
        $envantersay=Envanter::where('okul','yönetim')->count();
        $bosenvanter=Envanter::where('okul','yönetim')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
           })->count();
        $yonetim = Kisiler::where('kadro','yönetim')->with('envanter')->where('id','>','1')->orderBy('ad_soyad')->paginate(20);
        return view('admin.yonetimkadro', compact('yonetim','kisisay','envantersay','bosenvanter'));
    }

    public function anaokulukadrogoster()
    {
        $kisisay=Kisiler::where('kadro','anaokulu')->count();
        $envantersay=Envanter::where('okul','anaokulu')->count();
        $bosenvanter=Envanter::where('okul','anaokulu')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
           })->count();
        $ana = Kisiler::where('kadro','anaokulu')->with('envanter')->orderBy('ad_soyad')->paginate(20);
        return view('admin.anaokulukadro', compact('ana','kisisay','envantersay','bosenvanter'));
    }

    public function ilkogretimkadrogoster()
    {
        $kisisay=Kisiler::where('kadro','ilköğretim')->count();
        $envantersay=Envanter::where('okul','ilköğretim')->count();
        $bosenvanter=Envanter::where('okul','ilköğretim')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
           })->count();
        $ilkorta = Kisiler::where('kadro','ilkogretim')->with('envanter')->orderBy('ad_soyad')->paginate(20);
        return view('admin.ilkogretimkadro', compact('ilkorta','kisisay','envantersay','bosenvanter'));
    }

    public function lisekadrogoster()
    {    
        $kisisay=Kisiler::where('kadro','lise')->count();
        $envantersay=Envanter::where('okul','Lise')->count();
        $bosenvanter=Envanter::where('okul','lise')->where(function ($query) {
               $query->where('kisi_id', '=',1)
                     ->orWhere('kisi_id',null);
           })->count();
        $lise = Kisiler::where('kadro','lise')->with('envanter')->orderBy('ad_soyad');
        //   if(request()->get('aramayap')){
        //     $lise=$lise->where('ad_soyad','LIKE',"%".request()->get('aramayap')."%");
        // }
        $lise=$lise->paginate(25);
        return view('admin.lisekadro', compact('lise','kisisay','envantersay','bosenvanter'));
    }

    public function idarikadrogoster()
    {
        $kisisay=Kisiler::where('kadro','idari')->count();
        $envantersay=Envanter::where('okul','idari')->count();
        $bosenvanter=Envanter::where('okul','idari')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->count();
        $idari = Kisiler::where('kadro','idari')->with('envanter')->orderBy('ad_soyad')->paginate(20);
        return view('admin.idarikadro', compact('idari','kisisay','envantersay','bosenvanter'));
    }

    public function destekkadrogoster()
    {
        $kisisay=Kisiler::where('kadro','destek')->count();
        $envantersay=Envanter::where('okul','destek')->count();
        $bosenvanter=Envanter::where('okul','destek')->orwhere('kisi_id',null)->orWhere('kisi_id','<',2)->count();
        $destek = Kisiler::where('kadro','destek')->with('envanter')->orderBy('ad_soyad')->paginate(20);
        return view('admin.destekkadro', compact('destek','kisisay','envantersay','bosenvanter'));
    }

     public function tumkadrogoster()
    {
    //    return $zimmetgonder=Kisiler::where();
        $kisisay=Kisiler::count();
        $envantersay=Envanter::count();
        $bosenvanter=Envanter::where('okul','Lise')->where('kisi_id',null)->orWhere('kisi_id','<',2)->count();
        $tumkadro = Kisiler::where('id','>','1')->with('envanter')->orderBy('ad_soyad')->paginate(330);
        return view('admin.tumkadro', compact('tumkadro','kisisay','envantersay','bosenvanter'));
    }

      public function anaokulukadroyonetici()
    {
        $anaokulu = Kisiler::where('kadro','anaokulu')->withCount('envanter')->orderBy('ad_soyad')->paginate(20);
        return view('yoneticianaokulu.anaokulukadro', compact('anaokulu'));
    }

      public function lisekadroyonetici()
    {
        $lise = Kisiler::where('kadro','lise')->withCount('envanter')->orderBy('ad_soyad')->paginate(20);
        return view('yoneticilise.lisekadro', compact('lise'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kadrobilgisi = Kadrolar::all();
        return view ('admin.kisiekle',compact('kadrobilgisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KisiCreateRequest $request)
    {
        Kisiler::create($request->post());
        return redirect()->route('kisiler.create')->withSuccess('Kişi Başarıyla Eklendi.');
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
        
        $envanterbosta=Envanter::where('kisi_id',1)->orWhere('kisi_id',null)->orderBy('id','DESC')->paginate(195);
        $kadrobilgisi = Kadrolar::all();
        $kisi =Kisiler::with('envanter')->find($id)?? abort(404,'Kişi Bulunamadı');
       
       
        return view ('admin.kisiedit',compact('kisi','kadrobilgisi','envanterbosta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KisiUpdateRequest $request, $id)
    {   
        
        $kisi =Kisiler::find($id) ?? abort(404,'Kişi Bulunamadı');
        
        Kisiler::where('id',$id)->update($request->except(['_method','_token']));
        return redirect()->route('kisiler.edit',$id)->withSuccess('Kişi Başarıyla Güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kisi =Kisiler::find($id) ?? abort(404,'Kişi Bulunamadı');
        $kisi->delete();
        return redirect()->route('tumkadroname')->withSuccess('Kişi Başarıyla Silindi.');
    }
}
