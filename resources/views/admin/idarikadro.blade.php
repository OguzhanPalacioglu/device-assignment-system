<x-app-layout>
    <x-slot name="header">
        İDARİ KADRO
    </x-slot>
    <div class="card ">
        <ul class="list-group m-auto list-group-horizontal">
            <li class="list-group-item ">
                İdari Kadro Kişi Sayısı
                <span class="badge bg-primary rounded-pill">{{ $kisisay }}</span>
            </li>
            <li class="list-group-item ">
                İdari Envanter Sayısı
                <span class="badge bg-warning rounded-pill">{{ $envantersay }}</span>
            </li>
            <li class="list-group-item">
                İdari Boştaki Cihaz Sayısı
                <a href="{{route('idarienvantername')}}"><span class="badge bg-success rounded-pill">{{ $bosenvanter }}</span></a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-body">
            {{-- <h5 class="card-title"><a href="#" class="btn btn-md btn-success"> Kişi Ekle </a> </h5> --}}
             <table class="table table-striped table-bordered  table-sm">
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
                   @foreach ($idari as $i)
                    <tr>
                        <td>{{$i->ad_soyad}}</td>
                        <td>{{$i->birim_zumre }}</td>
                        <td>{{$i->kadro }}</td>
                        <td>
                            <table class="table table-sm">
                                <tr>
                                    @foreach ($i->envanter as $o)
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
                        <td>
                            <a href="{{route('kisiler.edit',$i->id)}}"
                                class="btn btn-sm btn-primary">İşlemler</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$idari->links()}}
        </div>
    </div>
</x-app-layout>
