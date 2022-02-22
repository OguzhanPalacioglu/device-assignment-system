<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Envanter;
use App\Models\Kisiler;
use App\Http\Requests\EnvanterCreateRequest;
use App\Http\Requests\EnvanterUpdateRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExcelExport;

class MainController extends Controller
{
    public function dashboard()
    {
        $kisisay=Kisiler::count();
        $envantersay=Envanter::count();
        $bosenvanter=Envanter::where('kisi_id',null)->orWhere('kisi_id','=',1)->count();
        $tumzimmetsiz=Envanter::where('kisi_id',null)->orWhere('kisi_id','=',1)->get(); 
        $tumkadro = Kisiler::where('id','>','1')->with('envanter')->orderBy('ad_soyad');
        if(request()->get('kisiara'))
        {
                $tumkadro=$tumkadro->where('ad_soyad','LIKE',"%".request()->get('kisiara')."%")
                ->orwhere('kadro',"LIKE","%".request()->get('kisiara')."%")
                ->orwhere('birim_zumre','LIKE',"%".request()->get('kisiara')."%");
                ;
        } 
           $tumkadro=$tumkadro->paginate(25);
// İlkokul Yöneticinin Gördüğü Dashboard İşlemleri Aşağıda       
        $ilkokulsay=Kisiler::where('kadro','ilköğretim')->count();
        $ilkokulenvantersay=Envanter::where('okul','ilköğretim')->count();
        $ilkokulenvanterbosta=Envanter::where('okul','ilköğretim')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->count();
        $ilkortazimmetsiz=Envanter::where('okul','ilköğretim')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->get();           
        $ilkokul = Kisiler::where('kadro','ilköğretim')->with('envanter')->orderBy('ad_soyad');
        if(request()->get('kisiara'))
        {
                $ilkokul=$ilkokul->where('kadro','ilköğretim')->where(function ($query) {
                $query->where('ad_soyad','LIKE',"%".request()->get('kisiara')."%")
                ->orwhere('kadro',"LIKE","%".request()->get('kisiara')."%")
                ->orwhere('birim_zumre','LIKE',"%".request()->get('kisiara')."%");
                });
        } $ilkokul=$ilkokul->paginate(25);

// Anaokulu Yöneticinin Gördüğü Dashboard İşlemleri Aşağıda
        $anaokulusay=Kisiler::where('kadro','anaokulu')->count();
        $anaokuluenvantersay=Envanter::where('okul','anaokulu')->count();
        $anaokuluenvanterbosta=Envanter::where('okul','anaokulu')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->count();
        $anaokuluzimmetsiz=Envanter::where('okul','anaokulu')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->get();           
        $anaokulu = Kisiler::where('kadro','anaokulu')->with('envanter')->orderBy('ad_soyad');
        if(request()->get('kisiara'))
        {
                $anaokulu=$anaokulu->where('kadro','anaokulu')->where(function ($query) {
                $query->where('ad_soyad','LIKE',"%".request()->get('kisiara')."%")
                ->orwhere('kadro',"LIKE","%".request()->get('kisiara')."%")
                ->orwhere('birim_zumre','LIKE',"%".request()->get('kisiara')."%");
                });
        } $anaokulu=$anaokulu->paginate(25);
// Lise Yöneticinin Gördüğü Dashboard İşlemleri Aşağıda
        $lisesay=Kisiler::where('kadro','lise')->count();
        $liseenvantersay=Envanter::where('okul','lise')->count();
        $liseenvanterbosta=Envanter::where('okul','lise')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->count();
        $lisezimmetsiz=Envanter::where('okul','lise')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->get();         
        $lise = Kisiler::where('kadro','lise')->with('envanter')->orderBy('ad_soyad');
        if(request()->get('kisiara'))
        {
                $lise=$lise->where('kadro','lise')->where(function ($query) {
                $query->where('ad_soyad','LIKE',"%".request()->get('kisiara')."%")
                ->orwhere('kadro',"LIKE","%".request()->get('kisiara')."%")
                ->orwhere('birim_zumre','LIKE',"%".request()->get('kisiara')."%");
                });
        } $lise=$lise->paginate(25);
    return view('dashboard',compact('tumkadro','lise','anaokulu','ilkokul','kisisay','envantersay','bosenvanter','tumzimmetsiz',
        'anaokulusay','anaokuluenvantersay','anaokuluenvanterbosta','anaokuluzimmetsiz',
        'ilkokulsay','ilkokulenvantersay','ilkokulenvanterbosta','ilkortazimmetsiz',
        'lisesay','liseenvantersay','liseenvanterbosta','lisezimmetsiz'));
    }

    
   
    // public function aramayap(){
    //     $tumkadro = Kisiler::with('envanter')->where(function ($query) ;
    //     if(request()->get('aramayap')){
    //         $tumkadro=$tumkadro->where('kisiler','LIKE',"%".request()->get('aramayap')."%");
    //     }
    //     $tumkadro=$tumkadro->paginate(25);
    // return (compact('tumkadro'));
    // }

    public function yoneticianaokulu() 
    {
    $anaokulu = Kisiler::where('kadro','anaokulu')->with('envanter')->orderBy('ad_soyad')->paginate(25);
    return view('yoneticianaokulu.lisekadro', compact('anaokulu'));
    }


    public function yoneticilise() 
    {
    $lise = Kisiler::where('id','lise')->orderBy('ad_soyad')->paginate(20);
    return view('yoneticilise.lisekadro', compact('lise'));
    }


    //Export Alanı Başlangıç.

    public function export()
    {
        $excel =  Kisiler::where('id','>','1')->orderBy('ad_soyad')->get();
        $excel1= envanter::where('okul','anaokulu')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->get();
        return Excel::download(new ExcelExport($excel,$excel1),'tum_zimmet_dokumu.xlsx');

    }

    public function anaokuluexport()
    {
        $excel =  Kisiler::where('kadro','anaokulu')->orderBy('ad_soyad')->get();
        $excel1= envanter::where('okul','anaokulu')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->get();
        return Excel::download(new ExcelExport($excel,$excel1),'anaokulu_zimmet_dokumu.xlsx');

    }

    public function ilkortaexport()
    {
        $excel =  Kisiler::where('kadro','ilköğretim')->orderBy('ad_soyad')->get();
        $excel1= envanter::where('okul','ilköğretim')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->get();
        return Excel::download(new ExcelExport($excel,$excel1),'ilk-ortaokul_zimmet_dokumu.xlsx');

    }

    public function liseexport()
    {
       $excel =  Kisiler::where('kadro','lise')->orderBy('ad_soyad')->get();
       $excel1= envanter::where('okul','lise')->where(function ($query) {
               $query->where('kisi_id', '=', 1)
                     ->orWhere('kisi_id',null);
                 })->get();
        return Excel::download(new ExcelExport($excel,$excel1),'lise_zimmet_dokumu.xlsx');

    }

    //Export Alanı Bitiş.
    
}
