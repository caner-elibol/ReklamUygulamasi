<x-app-layout>
    <x-slot name="header">
        Tüm Reklamlar
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><a href="{{route('benim.create')}}" class="btn btn-sm btn-primary"> Bakiyem : {{$bakiyem}} ₺ </a></h5>
            <h5 class="card-title"><a href="{{route('benim.create')}}" class="btn btn-sm btn-success"> Yeni Reklam Oluştur </a></h5>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Başlık</th>
                    <th scope="col">Açıklama</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Kazanç</th>
                    <th scope="col">Günlük Limit</th>
                    <th scope="col">Site URL</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                      $no=1;
                  @endphp
                    @foreach ($reklamlar as $reklam)
                  <tr>
                    <th scope="row">{{$no}}</th>
                    <td>{{$reklam->baslik}}</td>
                    <td>{{$reklam->aciklama}}</td>
                    <td style="text-color: white" class="bg-{{ $reklam->durum === "aktif"?'success':'danger' }}">{{$reklam->durum}}</td>
                    <td>{{$reklam->maliyet}} ₺</td>
                    <td>{{$reklam->gunluk_limit}}</td>
                    <td><a href="{{route('hepsi.update',$reklam->id)}}" target="_blank">{{$reklam->siteurl}}</a></td>
                  </tr>
                  @php
                      $no++;
                  @endphp
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <x-slot name="js">
    </x-slot>
</x-app-layout>
