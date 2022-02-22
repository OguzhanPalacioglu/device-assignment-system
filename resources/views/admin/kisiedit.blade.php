<x-app-layout>
    <x-slot name="header">
        İşlemler
    </x-slot>
    
{{-- Kişi Güncelle Alanı--}}
    <div class="row">
        <div class="card kenar col-md-4">
            <div class="card-header text-center"><b>Kişi Güncelleme Alanı</b></div>
            <div class="card-body">
                <form method="POST" action="{{route('kisiler.update',$kisi->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group py-1">
                        <label class="py-1">Ad Soyad</label>
                        <input type="text" name="ad_soyad" class="form-control" placeholder="Ad Soyad"
                            value="{{$kisi->ad_soyad}}">
                    </div>
                    <div class="col-md-5">
                        <label class="py-1">Kadro Bilgisi</label>
                        <select class="form-control" name="kadro">
                            <option>{{$kisi->kadro}}</option>
                            @foreach ($kadrobilgisi as $kadrogoster)
                            <option>{{$kadrogoster->kadro}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group py-1">
                        <label class="py-1">Birim/Zümre Bilgisi</label>
                        <input type="text" name="birim_zumre" class="form-control"
                            placeholder="Fizik, Kimya, Edebiyat..." value="{{$kisi->birim_zumre}}">
                    </div>
                    <div class="mt-3">
                    <div class="float-left">
                        <input class="btn btn-sm btn-primary" type="submit" value="Kişiyi Güncelle"
                            aria-label=".form-control-lg example">
                    </div>

                </form>
                <div class="float-right">
                    <a href="{{route('kisiler.destroy',$kisi->id)}}"
                        onclick="return confirm('{{$kisi->ad_soyad}} adlı kişiyi silmek istediğine emin misin? Bu işlem geri alınamaz.')"
                        <input class="btn btn-sm btn-danger" type="submit" aria-label=".form-control-lg example">Kişiyi Sil</a>
                </div>
                </form>
            </div>
    </div>
</div>
        {{-- Kişi Güncelle Alanı Bitiş--}}

        {{-- Zimmet Alanı--}}
        <div class="card kenar col-8 ">
            <table class="table table-striped table-bordered  table-sm">
                <thead>
                    <tr>
                        <th scope="col">Üzerindeki Zimmetler</th>
                        <th scope="col">İşlemler</th>
                        <th scope="col">Düzenle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kisi->envanter as $o)
                    <tr>
                        <td><strong>{{$loop->iteration}}-</strong>
                            {{$o->urun_cesidi}}-
                            {{$o->urun_marka}}-
                            {{$o->urun_model}}-
                            {{$o->urun_ozellik}}-
                            {{$o->seri_no}}
                        </td>
                        <td style="width:100px">
                            <form method="POST" action="{{route('zimmetsil.update',$o->id)}}">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-sm btn-danger" name="kisi_id" value="1"
                                    onclick="return confirm('Zimmetten Çıkartılsın mı? Bu İşlem Geri Alınamaz')">Zimmetten Çıkar</a>
                            </form>
                        </td>
                        <td style="width:75px"><a href="{{route('envanter.edit',$o->id)}}" class="btn btn-sm btn-primary">Envanter Düzenle</a></td>
                        @endforeach
                </tbody>
            </table>
        </div>
        {{-- Zimmet Alanı Bitiş--}}

        {{-- Boştaki Cihazlar Alanı--}}
 <div class="card kenar">
        <div class="card-body">
            <a href="{{route('envanter.create')}}" class="btn btn-sm btn-primary float-right"> Yeni Envanter Ekle </a> 
                <div class="card-header text-center">
                     <h5><b>Zimmetlenebilecek Envanterler</b></h5>
                </div>            
            <table class="table table-striped table-bordered  table-sm">
                <thead>
                    <tr>
                        <th scope="col">Ürünün Çeşidi</th>
                        <th scope="col">Markası</th>
                        <th scope="col">Modeli</th>
                        <th scope="col">Özellikleri</th>
                        <th scope="col">Seri No</th>
                        <th scope="col">Kadro</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($envanterbosta as $envantergoster)
                    <tr>
                        <td>{{$envantergoster->urun_cesidi}}</td>
                        <td>{{$envantergoster->urun_marka}}</td>
                        <td>{{$envantergoster->urun_model}}</td>
                        <td>{{$envantergoster->urun_ozellik}}</td>
                        <td>{{$envantergoster->seri_no}}</td>
                        <td>{{$envantergoster->okul}}</td>
                        <td style="width:100px">
                             <form method="POST" action="{{route('zimmet.update',$envantergoster->id)}}">
                                @csrf
                                @method('PUT')
                                <button class="btn-sm btn-vekla" name="kisi_id" value="{{$kisi->id}}"
onclick="return confirm('{{$envantergoster->urun_cesidi}}-{{$envantergoster->urun_marka}}-{{$envantergoster->urun_model}}-{{$envantergoster->seri_no}} - Cihaz {{$kisi->ad_soyad}} adlı kişiye zimmetlensin mi?')">Zimmetle</a>
                            </form>                      
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
            {{$envanterbosta->links()}}
        </div>
</div>
{{-- Boştaki Cihazlar Alanı Bitiş--}}


    </div>
</x-app-layout>
