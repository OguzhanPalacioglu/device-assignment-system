<x-app-layout>
    <x-slot name="header">
        Envanter Güncelle
    </x-slot>
  
    <div class="row">
        <div class="card col-md-6 m-auto">
            <div class="card-body col-md-12 ">
                <form method="POST" action="{{route('envanter.update',$envanter->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group py-1">
                        <label class="py-1">Ürün Çeşidi</label>
                        <input type="text" name="urun_cesidi" class="form-control" placeholder="Ürün Çeşidi" value="{{$envanter->urun_cesidi}}">
                    </div>
                    <div class="form-group py-1">
                        <label class="py-1">Marka</label>
                        <input type="text" name="urun_marka" class="form-control" placeholder="Marka" value="{{$envanter->urun_marka}}">
                    </div>
                    <div class="form-group py-1">
                        <label class="py-1">Model</label>
                        <input type="text" name="urun_model" class="form-control" placeholder="Model" value="{{$envanter->urun_model}}">
                    </div>
                    <div class="form-group py-1">
                        <label class="py-1">Özellikleri</label>
                        <input type="text" name="urun_ozellik" class="form-control" placeholder="Varsa" value="{{$envanter->urun_ozellik}}">
                    </div>
                    <div class="col-md-5">
                         <label class="py-1">Envanter Bilgisi</label>
                        <select class="form-control" name="okul" value="">
                            <option>{{$envanter->okul}}</option>
                            @foreach ($kadrobilgisi as $kadrogoster)
                            <option>{{$kadrogoster->kadro}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group py-1">
                        <label class="py-1">Seri No</label>
                        <input type="text"  class="form-control" name='seri_no' value="{{$envanter->seri_no}}" placeholder="Varsa" >
                    </div>
                        <div class="float-right py-4">
                            <input class="btn btn-primary btn-sm" type="submit" value= "Güncelle"
                                aria-label=".form-control-lg example">
                        </div>
                        <div class="float-left py-3"> <a href="{{route('envanter.destroy',$envanter->id)}}"
onclick="return confirm('{{$envanter->urun_cesidi}}-{{$envanter->urun_marka}}-{{$envanter->urun_model}}-{{$envanter->urun_ozellik}}-{{$envanter->seri_no}} Eşyayı silmek istediğine emin misin? Bu işlem geri alınamaz.')"
class="m-1 btn btn-sm btn-danger">Sil</a></div>
                    </div>
                </form>
            </div>
        </div>
    </form>
            </div>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#Kadro').change(function(){
                alert('Çalıştı.')
            })

        </script>
    </x-slot>
</x-app-layout>
