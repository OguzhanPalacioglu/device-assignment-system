<x-app-layout>
    <x-slot name="header">
        TÜM KADRO
    </x-slot>
  <div class="card mb-1">
        <ul class="list-group m-auto list-group-horizontal">
            <li class="list-group-item ">
               Tüm Kadro Kişi Sayısı
                <span class="badge bg-primary rounded-pill">{{ $kisisay }}</span>
            </li>
            <li class="list-group-item ">
                Tüm Envanter Sayısı
                <span class="badge bg-warning rounded-pill">{{ $envantersay }}</span>
            </li>
            <li class="list-group-item">
                Tüm Boştaki Cihaz Sayısı
              <a href="{{route('envanter.index')}}">  <span class="badge bg-success rounded-pill">{{ $bosenvanter }}</span></a>
            </li>
        </ul>
    </div>
    <div class="card">
      
    <div class="card">
        <div class="card-body">
            {{-- <h5 class="card-title"><a href="{{route('kisiler.create')}}" class="btn btn-md btn-success"> Kişi Ekle </a>
            </h5> --}}
            <table class="table table-striped table-bordered  table-sm">
                <thead>
                    <tr>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col" style="width:150px">Branş</th>
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
                                    {{$o->seri_no}}<br>
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



</x-app-layout>
