<x-app-layout>
    <x-slot name="header">
        {{$reklam->baslik}}
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><a href="{{route('benim.create')}}" class="btn btn-sm btn-primary"> Bakiyem : {{$bakiyem}} ₺ </a></h5>
            <h5 class="card-title"><a href="{{route('benim.create')}}" class="btn btn-sm btn-success"> Yeni Reklam Oluştur </a></h5>
            <table class="table table-bordered">
                <thead>
                  <tr>

                    <th scope="col">ID</th>
                    <th scope="col">Başlık</th>
                    <th scope="col">Açıklama</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Kazanç</th>
                    <th scope="col">Günlük Limit</th>
                    <th scope="col">Site URL</th>
                    <th scope="col">Ödeme</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>

                    <th scope="row">{{$reklam->id}}</th>
                    <td>{{$reklam->baslik}}</td>
                    <td>{{$reklam->aciklama}}</td>
                    <td style="text-color: white" class="bg-{{ $reklam->durum === "aktif"?'success':'danger' }}">{{$reklam->durum}}</td>
                    <td>{{$reklam->maliyet}} ₺</td>
                    <td>{{$reklam->gunluk_limit}}</td>
                    <td>{{$reklam->siteurl}}</td>
                    <td><a href="{{route('hepsi.edit',$reklam->id)}}" class="btn btn-sm btn-success"> Ödemeyi Al </a></td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</x-app-layout>
