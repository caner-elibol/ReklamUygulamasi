<x-app-layout>
    <x-slot name="header">
        Benim Reklamlarım
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5>Bakiyeniz: <span class="badge bg-primary"> {{$bakiye}} ₺ </span></h5>
            <h5 class="card-title"><a href="{{route('benim.create')}}" class="btn btn-sm btn-success"> Yeni Reklam Oluştur </a></h5>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Başlık</th>
                    <th scope="col">Açıklama</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Maliyet</th>
                    <th scope="col">Günlük Limit</th>
                    <th scope="col">Site URL</th>
                    <th scope="col">İşlem</th>
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
                    <td>{{$reklam->siteurl}}</td>
                    <td>
                        <a href="{{route('benim.destroy',$reklam->id)}}" class="btn btn-sm btn-danger">Reklamı Kaldır</a>
                    </td>
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
