<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Envanter;
use App\Models\Kisiler;
use App\Models\Kadrolar;
use App\Http\Requests\EnvanterCreateRequest;
use App\Http\Requests\EnvanterUpdateRequest;


class EnvanterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function anaokuluenvanter()
    {
        $anaokuluzimmetsiz=Envanter::where('okul','anaokulu')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->get();
        $envanter = Kisiler::with('envanter')->where('kadro','anaokulu')->orderBy('ad_soyad','asc')->get();
        return view ('admin.anaokuluenvanter', compact('envanter','anaokuluzimmetsiz'));
    }

    public function ilkortaenvanter()
    {
        $ilkortazimmetsiz=Envanter::where('okul','ilköğretim')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->get();
        $envanter= Kisiler::with('envanter')->where('kadro','ilköğretim')->orderBy('ad_soyad','asc')->get();
        return view ('admin.ilkogretimenvanter', compact('envanter','ilkortazimmetsiz'));
    }

    public function liseenvanter()
    {
        $lisezimmetsiz=Envanter::where('okul','lise')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->get();
        $envanter = Kisiler::with('envanter')->where('kadro','Lise')->orderBy('ad_soyad','asc')->get();
        return view ('admin.liseenvanter', compact('envanter','lisezimmetsiz'));
    }

    public function idarienvanter()
    {
        
        $idarizimmetsiz=Envanter::where('okul','idari')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->get();
        $envanter = Kisiler::with('envanter')->where('kadro','idari')->orderBy('ad_soyad','asc')->get();
        return view ('admin.idarienvanter', compact('envanter','idarizimmetsiz'));
    }

    public function destekenvanter()
    {
        $destekzimmetsiz=Envanter::where('okul','destek')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->get();
        $envanter = Kisiler::with('envanter')->where('kadro','destek')->orderBy('ad_soyad','asc')->get();
        return view ('admin.destekenvanter', compact('envanter','destekzimmetsiz'));
    }


    public function index()
    {
    $tumzimmetsiz=Envanter::where('kisi_id', '=', 1)->orWhere('kisi_id',null)->get();  
    $envanter = Kisiler::with('envanter')->where('id','>','1')->orderby('ad_soyad')->get();
    return view ('admin.envanter', compact('envanter','tumzimmetsiz'));

    //  return   $envanter = Envanter::where('id','>',1)->orderBy('id','DESC')->where(function ($query) {
    //            $query->DB=Kisiler::with('envanter')
    //                  ->where('id','>',1);
    //              })->get();
    //      return view ('admin.envanter', compact('envanter'));
    }

    public function envanterbosta()
    {
        $envanterbosta = Envanter::where('kisi_id','=',1)->orwhere('kisi_id',null)->orderBy('id','DESC')->paginate(20);
        return view ('admin.envanterbosta', compact('envanterbosta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kadrobilgisi = Kadrolar::all();
        return view ('admin.envanterekle',compact('kadrobilgisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnvanterCreateRequest $request)
    {
        Envanter::create($request->post());
        return redirect()->route('envanter.create')->withSuccess('Ürün Başarıyla Eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kadrobilgisi = Kadrolar::all();
        $envanter =Envanter::find($id) ?? abort(404,'Ürün Bulunamadı');
        return view ('admin.envanteredit',compact('envanter','kadrobilgisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EnvanterUpdateRequest $request, $id)
    {
        $envanter =Envanter::find($id) ?? abort(404,'Ürün Bulunamadı');
        
        Envanter::where('id',$id)->first()->update($request->except(['_method','_token']));
        return redirect()->route('envanter.edit',$id)->withSuccess('Ürün Başarıyla Güncellendi.');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $envanter =Envanter::find($id) ?? abort(404,'Ürün Bulunamadı');
        $envanter->delete();
        return redirect()->route('envanter.index')->withSuccess('Envanter Bilgisi Başarıyla Silindi.');
    }


    // Yöneticilerin gördüğü envanter sayfaları başlangıç

    public function ilkogretimbosenvanter()
        {
        $envanterbosta =Envanter::where('okul','ilköğretim')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->paginate(20);
        return view ('yoneticiilkogretim.ilkogretimbosenvanter', compact('envanterbosta'));
         }

     public function anaokulubosenvanter()
        {
        $envanterbosta =Envanter::where('okul','anaokulu')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->paginate(20);
        return view ('yoneticianaokulu.anaokulubosenvanter', compact('envanterbosta'));
         }     
    
     public function lisebosenvanter()
        {
        $envanterbosta =Envanter::where('okul','lise')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->paginate(20);
        return view ('yoneticilise.lisebosenvanter', compact('envanterbosta'));
         }     

    // Yöneticilerin gördüğü envanter sayfaları bitiş.     

}
