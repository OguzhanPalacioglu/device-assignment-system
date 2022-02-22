<x-app-layout>
    <x-slot name="header">
        TÜM KADRO ENVANTER LİSTESİ
    </x-slot>

    <div class="card mb-1">
        <div class="card-body">
            <div class="card-header text-center"><b>ZİMMETTE OLMAYANLAR</b></div>
            <div class="m-2">
                <h5 class="card-title float-right"><a href="{{route('envanter.create')}}"
                        class="btn btn-sm btn-primary"> Envanter Ekle </a> </h5>
            </div>
            @if ($tumzimmetsiz->isEmpty())
            Tüm Kadro Envanterinde Zimmette Olmayan Cihaz Bulunamadı.
            @else
            <table class="table table-striped table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
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
                    @foreach ($tumzimmetsiz as $bos)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$bos->urun_cesidi}}</td>
                        <td>{{$bos->urun_marka}}</td>
                        <td>{{$bos->urun_model}}</td>
                        <td>{{$bos->urun_ozellik}}</td>
                        <td>{{$bos->seri_no}}</td>
                        <td>{{$bos->okul}}</td>
                        <td style="width:135px">
                            @if(auth()->user()->type=='admin')
                            <a href="{{route('envanter.edit',$bos->id)}}" class="m-1 btn btn-sm btn-primary">Düzenle</a>
                            <a href="{{route('envanter.destroy',$bos->id)}}"
                                onclick="return confirm('{{$bos->urun_cesidi}}- {{$bos->urun_marka}}-{{$bos->urun_model}}-{{$bos->urun_ozellik}}-{{$bos->seri_no}} Eşyayı silmek istediğine emin misin? Bu işlem geri alınamaz.')"
                                class="m-1 btn btn-sm btn-danger">Sil
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-header text-center"><b>ZİMMETLİ CİHAZLAR</b></div>
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
                    @foreach ($envanter as $envantergoster)
                    @foreach ($envantergoster->envanter as $a)
                    <tr>
                        <td>{{$a->urun_cesidi}}</td>
                        <td>{{$a->urun_marka}}</td>
                        <td>{{$a->urun_model}}</td>
                        <td>{{$a->urun_ozellik}}</td>
                        <td>{{$a->seri_no}}</td>
                        <td>{{$a->okul}}</td>
                        <td style="width:210px"><a href="{{route('kisiler.edit',$envantergoster->id)}}"
                                class="btn btn-sm btn-vekla d-flex justify-content-center m-1">{{$envantergoster->ad_soyad}}</a>
                        </td>
                        <td class="d-flex justify-content-center m-1">
                            @if(auth()->user()->type=='admin')
                            <a href="{{route('envanter.edit',$a->id)}}" class="m-1 btn btn-sm btn-primary">Düzenle</a>
                            <a href="{{route('envanter.destroy',$a->id)}}"
                                onclick="return confirm('{{$a->urun_cesidi}}-{{$a->urun_marka}}-{{$a->urun_model}}-{{$a->urun_ozellik}}-{{$a->seri_no}} Eşyayı silmek istediğine emin misin? Bu işlem geri alınamaz.')"
                                class="m-1 btn btn-sm btn-danger">Sil</a>
                            @endif
                        </td>
                    </tr> @endforeach
                    @endforeach
                </tbody>
            </table>
            {{-- {{$envanter->links()}} --}}
        </div>
    </div>
</x-app-layout>
