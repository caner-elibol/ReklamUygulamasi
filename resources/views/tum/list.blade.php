<x-app-layout>
    <x-slot name="header">
        Tüm Reklamlarım
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><a href="{{route('benim.create')}}" class="btn btn-sm btn-primary"> Bakiyem : {{$bakiye}} ₺ </a></h5>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Başlık</th>
                    <th scope="col">Açıklama</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Maliyet</th>
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
                    <th scope="row">{{$reklam->id}}</th>
                    <td>{{$reklam->baslik}}</td>
                    <td>{{$reklam->aciklama}}</td>
                    <td style="text-color: white" class="bg-{{ $reklam->durum === "aktif"?'success':'danger' }}">{{$reklam->durum}}</td>
                    <td>{{$reklam->maliyet}} ₺</td>
                    <td>{{$reklam->gunluk_limit}}</td>
                    <td>{{$reklam->siteurl}}</td>
                  </tr>
                  @php
                      $no++;
                  @endphp
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</x-app-layout>
