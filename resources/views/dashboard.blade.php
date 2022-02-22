<x-app-layout>
    <x-slot name="header">
        ZİMMET SİSTEMİ
    </x-slot>

    @include('admin.search')

@if(auth()->user()->type=='admin')

    <div class="card mb-1">
        <ul class="list-group m-auto list-group-horizontal">
            <li class="list-group-item ">
                Tüm Kadro Kişi Sayısı
                <span class="badge bg-primary rounded-pill">{{ $kisisay }}</span>
            </li>
            <li class="list-group-item ">
                Tüm Kadro Envanter Sayısı
                <span class="badge bg-warning rounded-pill">{{ $envantersay }}</span>
            </li>
            <li class="list-group-item">
                Tüm Kadro Boştaki Cihaz Sayısı
                <a href="{{route('envanter.index')}}"><span
                        class="badge bg-success rounded-pill">{{ $bosenvanter }}</span></a>
            </li>
        </ul>
        <div><a class="btn btn-primary mb-2 float-right" href="{{route('exportname')}}">Excel'e Aktar</a></div>
    </div>

    @if ($tumzimmetsiz->isEmpty())
    @else
    <div class="card mb-1">
        <div class="card-body">
            <div class="card-header text-center"><b>ZİMMETTE OLMAYANLAR</b></div>
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
                        <td class="d-flex justify-content-center">
                            @if(auth()->user()->type=='admin')
                            <a href="{{route('envanter.edit',$bos->id)}}" class="m-1 btn btn-sm btn-primary">Düzenle</a>
                            <a href="{{route('envanter.destroy',$bos->id)}}"
                                onclick="return confirm('{{$bos->urun_cesidi}}- {{$bos->urun_marka}}-{{$bos->urun_model}}-{{$bos->urun_ozellik}}-{{$bos->seri_no}} Eşyayı silmek istediğine emin misin? Bu işlem geri alınamaz.')"
                                class="m-1 btn btn-sm btn-danger">Sil
                            </a>
                            @endif
                        </td>
                    </tr>@endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="card-header text-center"> <b>TÜM KADRO VE ZİMMET LİSTESİ</b></div>
            {{-- <h5 class="card-title"><a href="{{route('kisiler.create')}}" class="btn btn-md btn-success"> Kişi Ekle
            </a>
            </h5> --}}
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col" style="width:22px">Branş</th>
                        <th scope="col">Kadro</th>
                        <th scope="col">Üzerindeki Zimmetler</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tumkadro as $tumkadrogoster)
                    <tr>
                        <td>{{$tumkadrogoster->ad_soyad}}</td>
                        <td>{{$tumkadrogoster->birim_zumre }}</td>
                        <td>{{$tumkadrogoster->kadro }}</td>
                        <td>
                            <table class="table table-sm">
                                @foreach ($tumkadrogoster->envanter as $o)
                                <tr>
                                    <td><strong> {{$loop->iteration}}-</strong>
                                        {{$o->urun_cesidi}} -
                                        {{$o->urun_marka}} -
                                        {{$o->urun_model}} -
                                        {{$o->urun_ozellik}} -
                                        {{$o->seri_no}}
                                </tr>
                                @endforeach
                            </table>
                        </td>
                        <td>
                            @if(auth()->user()->type=='admin')
                            <a href="{{route('kisiler.edit',$tumkadrogoster->id)}}"
                                class="btn btn-sm btn-primary">İşlemler</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$tumkadro->links()}}
        </div>
    </div>
    @endif

    {{-- Lise Kadro Başlangıç --}}

    @if(auth()->user()->type=='lise')

      <div class="card mb-1">
        <ul class="list-group m-1 d-flex justify-content-center list-group-horizontal">
            <li class="list-group-item ">
                Lise Kadro Kişi Sayısı
                <span class="badge bg-primary rounded-pill">{{ $lisesay }}</span>
            </li>
            <li class="list-group-item ">
                Lise Envanter Sayısı
                <span class="badge bg-warning rounded-pill">{{ $liseenvantersay }}</span>
            </li>
            <li class="list-group-item">
                Lise Boştaki Cihaz Sayısı
                <a href="{{route('lisebosenvantername')}}"><span
                        class="badge bg-success rounded-pill">{{ $liseenvanterbosta }}</span></a>
            </li>
        </ul>
        <div><a class="btn btn-primary m-1 float-right" href="{{route('liseexportname')}}">Excel'e Aktar</a></div>
    </div>

    @if ($lisezimmetsiz->isEmpty())
    @else
    <div class="card mb-1">
        <div class="card-body">
            <div class="card-header text-center"><b>ZİMMETTE OLMAYANLAR</b></div>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lisezimmetsiz as $bos)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$bos->urun_cesidi}}</td>
                        <td>{{$bos->urun_marka}}</td>
                        <td>{{$bos->urun_model}}</td>
                        <td>{{$bos->urun_ozellik}}</td>
                        <td>{{$bos->seri_no}}</td>
                        <td>{{$bos->okul}}</td>
                    </tr>@endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="card-header text-center"> <b>LİSE KADRO VE ZİMMET LİSTESİ</b></div>
            
            <table class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col">Branş</th>
                        <th scope="col">Kadro</th>
                        <th scope="col">Üzerindeki Zimmetler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lise as $lisegoster)
                    <tr>
                        <td>{{$lisegoster->ad_soyad}}</td>
                        <td>{{$lisegoster->birim_zumre }}</td>
                        <td>{{$lisegoster->kadro }}</td>
                        <td>
                            <table class="table table-sm">
                                <tr>
                                    @foreach ($lisegoster->envanter as $o)
                                    <td><strong> {{$loop->iteration}}-</strong>
                                        {{$o->urun_cesidi}} -
                                        {{$o->urun_marka}} -
                                        {{$o->urun_model}} -
                                        {{$o->urun_ozellik}} -
                                        {{$o->seri_no}}<br>
                                </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$lise->links()}}
        </div>
    </div>
    @endif
    {{-- Lise Kadro Bitiş --}}

    {{-- Anaokulu Kadro Başlangıç --}}

    @if(auth()->user()->type=='anaokulu')

    <div class="card mb-1">
        <ul class="list-group m-1 d-flex justify-content-center list-group-horizontal">
            <li class="list-group-item ">
                Anaokulu Kişi Sayısı
                <span class="badge bg-primary rounded-pill">{{ $anaokulusay }}</span>
            </li>
            <li class="list-group-item ">
                Anaokulu Envanter Sayısı
                <span class="badge bg-warning rounded-pill">{{ $anaokuluenvantersay }}</span>
            </li>
            <li class="list-group-item">
                Anaokulu Boştaki Cihaz Sayısı
                <a href="{{route('anaokulubosenvantername')}}"><span
                        class="badge bg-success rounded-pill">{{ $anaokuluenvanterbosta }}</span></a>
            </li>
        </ul>
        <div><a class="btn btn-primary m-1 float-right" href="{{route('anaokuluexportname')}}">Excel'e Aktar</a></div>
    </div>

    @if ($anaokuluzimmetsiz->isEmpty())
    @else
    <div class="card mb-1">
        <div class="card-body">
            <div class="card-header text-center"><b>ZİMMETTE OLMAYANLAR</b></div>
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

                    </tr>
                </thead>
                <tbody>
                    @foreach ($anaokuluzimmetsiz as $bos)
                    <tr>

                        <td>{{$loop->iteration}}</td>
                        <td>{{$bos->urun_cesidi}}</td>
                        <td>{{$bos->urun_marka}}</td>
                        <td>{{$bos->urun_model}}</td>
                        <td>{{$bos->urun_ozellik}}</td>
                        <td>{{$bos->seri_no}}</td>
                        <td>{{$bos->okul}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="card-header text-center"> <b>ANAOKULU KADRO VE ZİMMET LİSTESİ</b></div>
            
            <table class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col">Branş</th>
                        <th scope="col">Kadro</th>
                        <th scope="col">Üzerindeki Zimmetler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anaokulu as $ana)
                    <tr>
                        <td>{{$ana->ad_soyad}}</td>
                        <td>{{$ana->birim_zumre }}</td>
                        <td>{{$ana->kadro}}</td>
                        <td>
                            <table class="table table-sm">
                                <tr>
                                    @foreach ($ana->envanter as $o)
                                    <td><strong> {{$loop->iteration}}-</strong>
                                        {{$o->urun_cesidi}} -
                                        {{$o->urun_marka}} -
                                        {{$o->urun_model}} -
                                        {{$o->urun_ozellik}} -
                                        {{$o->seri_no}}<br>
                                </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$anaokulu->links()}}
        </div>
    </div>
    @endif
    {{-- Anaokulu Kadro Bitiş --}}


    {{-- İlk-Ortaokul Kadro Başlangıç --}}
@if(auth()->user()->type=='ilkogretim')
 <div class="card mb-1">
        <ul class="list-group m-1 d-flex justify-content-center list-group-horizontal">
            <li class="list-group-item ">
                İlk-Ortaokul Kişi Sayısı
                <span class="badge bg-primary rounded-pill">{{ $ilkokulsay }}</span>
            </li>
            <li class="list-group-item ">
                İlk-Ortaokul Envanter Sayısı
                <span class="badge bg-warning rounded-pill">{{ $ilkokulenvantersay }}</span>
            </li>
            <li class="list-group-item">
                İlk-Ortaokul Boştaki Cihaz Sayısı
                <a href="{{route('ilkogretimbosenvantername')}}"> <span
                        class="badge bg-success rounded-pill">{{ $ilkokulenvanterbosta }}</span></a>
            </li>
        </ul>
       <div><a class="btn btn-primary m-1 float-right" href="{{route('ilkortaexportname')}}">Excel'e Aktar</a></div>
    </div>

    @if ($ilkortazimmetsiz->isEmpty())
    @else
    <div class="card mb-1">
        <div class="card-body">
            <div class="card-header text-center"><b>ZİMMETTE OLMAYANLAR</b></div>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ilkortazimmetsiz as $bos)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$bos->urun_cesidi}}</td>
                        <td>{{$bos->urun_marka}}</td>
                        <td>{{$bos->urun_model}}</td>
                        <td>{{$bos->urun_ozellik}}</td>
                        <td>{{$bos->seri_no}}</td>
                        <td>{{$bos->okul}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="card-header text-center"> <b>İLK-ORTAOKUL KADRO VE ZİMMET LİSTESİ</b></div>
            
            <table class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col">Branş</th>
                        <th scope="col">Kadro</th>
                        <th scope="col">Üzerindeki Zimmetler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ilkokul as $ilk)
                    <tr>
                        <td>{{$ilk->ad_soyad}}</td>
                        <td>{{$ilk->birim_zumre }}</td>
                        <td>{{$ilk->kadro }}</td>
                        <td>
                            <table class="table table-sm">
                                <tr>
                                    @foreach ($ilk->envanter as $o)
                                    <td><strong> {{$loop->iteration}}-</strong>
                                        {{$o->urun_cesidi}} -
                                        {{$o->urun_marka}} -
                                        {{$o->urun_model}} -
                                        {{$o->urun_ozellik}} -
                                        {{$o->seri_no}}<br>
                                </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$ilkokul->links()}}
        </div>
    </div>
    @endif
    {{-- İlk-Ortaöğretim Kadro Bitiş --}}
</x-app-layout>
