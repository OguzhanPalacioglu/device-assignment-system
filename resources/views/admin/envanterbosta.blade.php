<x-app-layout>
    <x-slot name="header">
        ZİMMETTE OLMAYAN ENVANTER
    </x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-right"><a href="{{route('envanter.create')}}" class="btn btn-sm btn-primary"> Envanter Ekle </a> </h5>
            <h5 class="card-title"><a href="{{ route('envanter.index') }}" class="btn btn-sm btn-vekla">Tüm Envanteri Gör</a></h5>
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
                        <td class="d-flex justify-content-center">
                          
                            <a href="{{route('envanter.edit',$envantergoster->id)}}" class="btn btn-sm btn-primary m-1">Düzenle</a>
                            <a href="{{route('envanter.destroy',$envantergoster->id)}}"
                            onclick="return confirm('{{$envantergoster->urun_marka}} Silmek istediğine emin misin? Bu işlem geri alınamaz.')"
                        <input class="btn btn-sm btn-danger m-1" type="submit" aria-label=".form-control-lg example">Sil</a>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
            {{$envanterbosta->links()}}
        </div>
    </div>


</x-app-layout>
