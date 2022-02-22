<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Envanter;
use App\Models\Kisiler;
use App\Http\Requests\ZimmetUpdateRequest;

class ZimmetController extends Controller
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
    public function update(ZimmetUpdateRequest $request, $id)
    {
        $envanter =Envanter::find($id) ?? abort(404,'Ürün Bulunamadı');
        
        Envanter::where('id',$id)->first()->update($request->except(['urun_cesidi','urun_marka','urun_model','urun_ozellik','seri_no','_method','_token']));
        return redirect()->back()->withSuccess('Zimmetleme İşlemi Başarılı.');
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

    

    // public function zimmettencikar(ZimmetUpdateRequest $request,$id)
    // {
    //     $envanter =Envanter::find($id) ?? abort(404,'Ürün Bulunamadı');
        
    //    Envanter::where('id',$id)->update($request->except(['urun_cesidi','urun_marka','urun_model','urun_ozellik','seri_no','_method','_token']));
    //     return redirect()->route('tumkadroname')->withSuccess('Zimmetleme İşlemi Başarılı.');
    // }
}

