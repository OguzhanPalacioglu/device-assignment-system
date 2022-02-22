<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zimmet;
use App\Models\Envanter;
use App\Http\Requests\ZimmetUpdateRequest;

class ZimmettenCikar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
       
        $zimmetsil =Envanter::findOrFail($id);
        
        $zimmetsil->update($request->except(['urun_cesidi','urun_marka','urun_model','urun_ozellik','seri_no','_method','_token']));
         return redirect()->back()->withSuccess('Zimmetten Çıkarma İşlemi Başarılı.');
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
        return redirect()->route('envanter.index')->withSuccess('Envanter Bilgisi Başarıyla Silindi.');
    }
}
