<x-app-layout>
    <x-slot name="header">
        ANAOKULU ZİMMETTE OLMAYAN ENVANTER
    </x-slot>
    <div class="card">
        <div class="card-body">
            @if ($envanterbosta->isEmpty())
            Anaokulu Envanterinde Zimmette Olmayan Cihaz Bulunamadı.
            @else
            <h5 class="card-title"><a href="{{ route('dashboard') }}" class="btn btn-sm btn-vekla">Zimmet Listesini Gör</a></h5>
            <table class="table table-striped table-bordered  table-sm">
                <thead>
                    <tr>
                        <th scope="col">Ürünün Çeşidi</th>
                        <th scope="col">Markası</th>
                        <th scope="col">Modeli</th>
                        <th scope="col">Özellikleri</th>
                        <th scope="col">Seri No</th>
                        <th scope="col">Kadro</th>
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
                    </tr>
                    @endforeach 
                </tbody>
            </table>
            {{$envanterbosta->links()}}
            @endif
        </div>
    </div>


</x-app-layout>
