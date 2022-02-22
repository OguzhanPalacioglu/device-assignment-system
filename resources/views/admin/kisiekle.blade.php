<x-app-layout>
    <x-slot name="header">
        Yeni Kişi Ekle
    </x-slot>
  
    <div class="row">
        <div class="card col-md-6 m-auto">
            <div class="card-body col-md-12 ">
                <form method="POST" action="{{route('kisiler.store')}}">
                    @csrf
                    <div class="form-group py-1">
                        <label class="py-1">Ad Soyad</label>
                        <input type="text" name="ad_soyad" class="form-control" placeholder="Ad Soyad" value="{{old('ad_soyad')}}">
                    </div>
                      
                    <div class="col-md-5">
                         <label class="py-1">Kadro Bilgisi</label>
                        <select class="form-control" name="kadro">
                            <option>Kadro Seçin</option>
                            @foreach ($kadrobilgisi as $kadrogoster)
                            <option>{{$kadrogoster->kadro}}</option>
                           @endforeach
                        </select>
                    </div>
                   
                       <div class="form-group py-1">
                        <label class="py-1">Birim/Zümre Bilgisi</label>
                        <input type="text" name="birim_zumre" class="form-control"  value="{{old('birim_zumre')}}" placeholder="Fizik, Bilgi Sistemleri Personeli, Müdür Yardımcısı..." >
                    </div>
                        <div class="float-right py-4">
                            <input class="btn btn-sm btn-primary" type="submit" value="Kişi Oluştur"
                                aria-label=".form-control-lg example">
                        </div>
                    </div>
                </form>
            </div>
        </div>
                 </form>
            </div>
        </div>
    </div>
</x-app-layout>
