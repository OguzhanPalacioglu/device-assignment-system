<x-app-layout>
    <x-slot name="header">
        DESTEK KADRO ENVANTER LİSTESİ
    </x-slot>

    <div class="card mb-1">
        <div class="card-body">
            <div class="card-header text-center"><b>DESTEK ZİMMETTE OLMAYANLAR</b></div>
            <div class="m-2">
                <h5 class="card-title float-right"><a href="{{route('envanter.create')}}"
                        class="btn btn-sm btn-primary"> Envanter Ekle </a> </h5>
            </div>
            @if ($destekzimmetsiz->isEmpty())
                    <td>Destek Kadro Envanterinde Zimmette Olmayan Eşya Bulunamadı.</td>
                    @else
                    @foreach ($destekzimmetsiz as $bos)
            <div class="card-header">Zimmette Olmayan Cihazlar</div>
            <table class="table table-striped table-bordered table-sm">
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
                   
                    <tr>
                        <td>{{$bos->urun_cesidi}}</td>
                        <td>{{$bos->urun_marka}}</td>
                        <td>{{$bos->urun_model}}</td>
                        <td>{{$bos->urun_ozellik}}</td>
                        <td>{{$bos->seri_no}}</td>
                        <td>{{$bos->okul}}</td>
                        <td>
                            @if(auth()->user()->type=='admin')
                            <a href="{{route('envanter.edit',$bos->id)}}" class="m-1 btn btn-sm btn-primary">Düzenle</a>
                            <a href="{{route('envanter.destroy',$bos->id)}}"
                                onclick="return confirm('{{$bos->urun_cesidi}}- {{$bos->urun_marka}}-{{$bos->urun_model}}-{{$bos->urun_ozellik}}-{{$bos->seri_no}} Eşyayı silmek istediğine emin misin? Bu işlem geri alınamaz.')"
                                class="m-1 btn btn-sm btn-danger">Sil
                            </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            @endforeach
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-header text-center"><b>DESTEK ZİMMETLİ ENVANTER LİSTESİ</b></div>
            <div class="m-2">
                <h5 class="card-title float-right"><a href="{{route('envanter.create')}}"
                        class="btn btn-sm btn-primary"> Envanter Ekle </a> </h5>
            </div>

            <table class="table table-striped table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">Ürünün Çeşidi</th>
                        <th scope="col">Markası</th>
                        <th scope="col">Modeli</th>
                        <th scope="col">Özellikleri</th>
                        <th scope="col">Seri No</th>
                        <th scope="col">Kadro</th>
                        <th scope="col">Zimmet Sahibi</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($envanter as $a)
                    @foreach ($a->envanter as $envantergoster)
                    <tr>
                        <td>{{$envantergoster->urun_cesidi}}</td>
                        <td>{{$envantergoster->urun_marka}}</td>
                        <td>{{$envantergoster->urun_model}}</td>
                        <td>{{$envantergoster->urun_ozellik}}</td>
                        <td>{{$envantergoster->seri_no}}</td>
                        <td>{{$envantergoster->okul}}</td>
                        <td style="width:210px"><a href="{{route('kisiler.edit',$a->id)}}" class="btn btn-sm btn-vekla d-flex justify-content-center m-1">{{$a->ad_soyad}}</a></td>
                        <td class="d-flex justify-content-center m-1">
                            @if(auth()->user()->type=='admin')
                            <a href="{{route('envanter.edit',$envantergoster->id)}}"
                                class="m-1 btn btn-sm btn-primary">Düzenle</a>
                            <a href="{{route('envanter.destroy',$envantergoster->id)}}"
                                onclick="return confirm('{{$envantergoster->urun_cesidi}}- {{$envantergoster->urun_marka}}-{{$envantergoster->urun_model}}-{{$envantergoster->urun_ozellik}}-{{$envantergoster->seri_no}} Eşyayı silmek istediğine emin misin? Bu işlem geri alınamaz.')"
                                class="m-1 btn btn-sm btn-danger">Sil
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach 
                    @endforeach
                </tbody>
            </table>
            {{-- {{$envanter->links()}} --}}
        </div>
    </div>
</x-app-layout>
