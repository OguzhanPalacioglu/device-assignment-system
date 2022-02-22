<x-app-layout>
    <x-slot name="header">
        LİSE KADRO
    </x-slot>
    <div class="card ">
        <ul class="list-group m-auto list-group-horizontal">
            <li class="list-group-item ">
                Lise Kadro Kişi Sayısı
                <span class="badge bg-primary rounded-pill">{{ $kisisay }}</span>
            </li>
            <li class="list-group-item ">
                Lise Envanter Sayısı
                <span class="badge bg-warning rounded-pill">{{ $envantersay }}</span>
            </li>
            <li class="list-group-item">
                Lise Boştaki Cihaz Sayısı
                <a href="{{route('liseenvantername')}}"><span class="badge bg-success rounded-pill">{{ $bosenvanter }}</span></a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-body">
            {{-- <h5 class="card-title"><a href="{{route('kisiler.create')}}" class="btn btn-md btn-success"> Kişi Ekle </a>
            </h5> --}}
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col">Branş</th>
                        <th scope="col" style="width:22px">Kadro</th>
                        <th scope="col">Üzerindeki Zimmetler</th>
                        <th scope="col">İşlemler</th>
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
                                        {{$o->seri_no}}
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </td>
                        <td>
                            <a href="{{route('kisiler.edit',$lisegoster->id)}}"
                                class="btn btn-sm btn-primary">İşlemler</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$lise->links()}}
        </div>
    </div>

</x-app-layout>
