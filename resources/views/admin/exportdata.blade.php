<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col"><strong>Zimmette Olmayanlar</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($excel1 as $zimmetsiz)
        <tr>
            <td>{{$loop->iteration}}- 
                {{$zimmetsiz->urun_cesidi}} -
                {{$zimmetsiz->urun_marka}} -
                {{$zimmetsiz->urun_model}} -
                {{$zimmetsiz->seri_no}} - 
                {{$zimmetsiz->okul}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col"><strong>Zimmetli Olanlar</strong></th>
        </tr>
    </thead>
    <thead>
        <tr>
            <th scope="col"><strong>Ad Soyad</strong> </th>
            <th scope="col"><strong>Branş</strong> </th>
            <th scope="col"><strong>Kadro</strong> </th>
            <th scope="col"><strong>Üzerindeki Zimmetler</strong> </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($excel as $tumkadrogoster)
        <tr>
            <td><strong>{{$loop->iteration}}</strong>-{{$tumkadrogoster->ad_soyad}}</td>
            <td>{{$tumkadrogoster->birim_zumre }}</td>
            <td>{{$tumkadrogoster->kadro }}</td>
            <td>
                <table class="table table-sm">
                    <tr></tr>
                    @foreach ($tumkadrogoster->envanter as $o)
                    <tr>
                        <td><strong>{{$loop->iteration}}</strong>-
                            {{$o->urun_cesidi}} -
                            {{$o->urun_marka}} -
                            {{$o->urun_model}} -
                            {{$o->urun_ozellik}} -
                            {{$o->seri_no}}</td>
                    </tr>
                    @endforeach
                </table>
        </tr>
        @endforeach
    </tbody>
</table>
