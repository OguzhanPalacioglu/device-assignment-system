<x-app-layout>
    <x-slot name="header">
        ANAOKULU KADRO
    </x-slot>
    <div class="card ">
        <ul class="list-group m-auto list-group-horizontal">
            <li class="list-group-item ">
                Anaokulu Kadro Kişi Sayısı
                <span class="badge bg-primary rounded-pill">{{ $kisisay }}</span>
            </li>
            <li class="list-group-item ">
                Anaokulu Envanter Sayısı
                <span class="badge bg-warning rounded-pill">{{ $envantersay }}</span>
            </li>
            <li class="list-group-item">
                Anaokulu Boştaki Cihaz Sayısı
                 <a href="{{route('anaokuluenvantername')}}"><span class="badge bg-success rounded-pill">{{ $bosenvanter }}</span></a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-body">
            {{-- <h5 class="card-title"><a href="#" class="btn btn-md btn-success"> Kişi Ekle </a> </h5> --}}
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col">Branş</th>
                        <th scope="col">Kadro</th>
                        <th scope="col">Üzerindeki Zimmetler</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ana as $a)
                    <tr>
                        <td>{{$a->ad_soyad}}</td>
                        <td>{{$a->birim_zumre }}</td>
                        <td>{{$a->kadro }}</td>
                        <td>
                            <table class="table table-sm">
                                <tr>
                                    @foreach ($a->envanter as $o)
                                    <td><strong> {{$loop->iteration}}-</strong>
                                        {{$o->urun_cesidi}}-
                                        {{$o->urun_marka}}-
                                        {{$o->urun_model}}-
                                        {{$o->urun_ozellik}}-
                                        {{$o->seri_no}}
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </td>
                        <td>
                            <a href="{{route('kisiler.edit',$a->id)}}" class="btn btn-sm btn-primary">İşlemler</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$ana->links()}}
        </div>
    </div>
</x-app-layout>
