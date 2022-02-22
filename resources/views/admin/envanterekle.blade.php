<x-app-layout>
    <x-slot name="header">
        Envantere Ekle
    </x-slot>
  
    <div class="container">
         <div class="card col-9 m-auto" >  {{--style="margin: auto;" --}}
            <div class="card-body col-md-12 ">
                <form method="POST" action="{{route('envanter.store')}}">
                    @csrf
                    <div class="form-group py-1">
                        <label class="py-1">Ürün Çeşidi</label>
                        <input type="text" name="urun_cesidi" class="form-control" placeholder="Ürün Çeşidi" value="{{old('urun_cesidi')}}">
                    </div>
                    <div class="form-group py-1">
                        <label class="py-1">Marka</label>
                        <input type="text" name="urun_marka" class="form-control" placeholder="Marka" value="{{old('urun_marka')}}">
                    </div>
                    <div class="form-group py-1">
                        <label class="py-1">Model</label>
                        <input type="text" name="urun_model" class="form-control" placeholder="Model" value="{{old('urun_model')}}">
                    </div>
                    <div class="form-group py-1">
                        <label class="py-1">Özellikleri</label>
                        <input type="text" name="urun_ozellik" class="form-control" placeholder="Varsa" value="{{old('urun_ozellik')}}">
                    </div>
                    <div class="col-md-5">
                         <label class="py-1">Envanter Bilgisi</label>
                        <select class="form-control" name="okul">
                            <option>Kadro Seçin</option>
                          @foreach ($kadrobilgisi as $kadrogoster)
                            <option>{{$kadrogoster->kadro}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                       <div class="form-group py-1">
                        <label class="py-1">Seri No</label>
                        <input type="text" name="seri_no" class="form-control"  value="{{old('seri_no')}}" placeholder="Varsa" >
                    </div>

               <!--c    
                    <div class="form-group py-1 d-inline-flex ">
                        <select class="form-select form-select-md" aria-label=".form-select-sm example " name="ka1dro"
                            placeholder="asdasd">
                            <option selected>Kadro Seçin</option>
                            <option value="1">}</option>
                            
                        </select>
                    </div>-->



 <!--check box--><!--c
                    <div class="form-group">
                        <input class="form-check-input" type="radio" name="kadro" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            İdari
                        </label>
                    </div>
                    <div class="form-group">
                        <input id="KadroSe1c" class="form-check-input" type="radio" name="Yönetim" 
                            checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Yönetim
                        </label>
                    </div>

                    <div class="form-group">
                    <input id="Kadro" class="form-check-input" type="checkbox" value="">
                    <label class="form-check-label" for="flexCheckDefault">
                        İdari checkbox
                    </label>
                    </div>
                    <div class="form-group">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Checked checkbox
                    </label>
                    </div>
                    check box-->


            <!--  

                    <div class="form-group py-1">
                        <div class="form-group d-inline-flex">
                            <select class="form-select form-select-md" aria-label=".form-select-sm example">
                                <option selected>Birim/Branş Seçin</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group py-1">
                        </div>-->
                        <div class="float-right py-4">
                            <input class="btn btn-sm btn-primary" type="submit" value="Envanter Ekle"
                                aria-label=".form-control-lg example">
                        </div>
                    </div>
                </form>
            </div>
        </div>
      <!--    <div class="card col-md-6">
            <div class="card-body ">
                <form method="POST" action="#">
                    
                    <div class="form-group py-1">
                        <label class="py-1">Ad Soyad</label>
                        <input type="text" name="ad_soyad" class="form-control" placeholder="Ad Soyad" >
                    </div>
                    <div class="form-group py-1 d-inline-flex ">
                        <select class="form-select form-select-md" aria-label=".form-select-sm example "
                            placeholder="asdasd">
                            <option selected>Kadro Seçin</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-group py-1">
                        <div class="form-group d-inline-flex">
                            <select class="form-select form-select-md" aria-label=".form-select-sm example">
                                <option selected>Birim/Branş Seçin</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group py-1">
                        </div>
                        <div class="float-right">
                            <input class="btn btn-success" type="submit" value="Kişi Oluştur"
                                aria-label=".form-control-lg example">
                        </div>
                    </div>  -->
                    <!--check box-->
                    <!--
                    <div class="form-group">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Default radio
                        </label>
                    </div>
                    <div class="form-group">
                        <input id="KadroSe1c" class="form-check-input" type="radio" name="flexRadioDefault" 
                            checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Default checked radio
                        </label>
                    </div>

                    <div class="form-group">
                    <input id="Kadro" class="form-check-input" type="checkbox" value="">
                    <label class="form-check-label" for="flexCheckDefault">
                        İdari checkbox
                    </label>
                    </div>
                    <div class="form-group">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Checked checkbox
                    </label>
                    </div>-->
                    <!--check box-->


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
