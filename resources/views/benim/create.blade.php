<x-app-layout>
    <x-slot name="header">
        Yeni Reklam Oluştur
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Oluşturma Formu</h5>
            <form action="{{route('benim.store')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4 pt-4">
                        <label for="baslik">Başlık</label>
                        <input type="text" name="baslik" class="form-control" id="baslik" placeholder="Başlık">
                    </div>
                    <div class="form-group col-md-4 pt-4">
                        <label for="aciklama">Açıklama</label>
                        <input type="text" name="aciklama" class="form-control" id="aciklama" placeholder="Açıklama">
                    </div>
                    <div class="form-group col-md-4 pt-4">
                        <label for="siteurl">Site Url</label>
                        <input type="text" name="siteurl" class="form-control" id="siteurl" placeholder="www.example.com">
                    </div>
                    <div id="quantitydiv" class="form-group col-md-4 pt-4">
                        <label for="maliyet">Maliyet</label>
                        <input type="number" step="any" name="maliyet" class="form-control" id="maliyet" placeholder="0.1">₺
                    </div>
                    <div id="quantitydiv" class="form-group col-md-4 pt-4">
                        <label for="gunluk_limit">Günlük Limit</label>
                        <input type="number" name="gunluk_limit" class="form-control" id="gunluk_limit" placeholder="100">
                    </div>
                </div>
                <div class="form-group col-md-12 pt-4">
                    <button type="submit" class="btn btn-primary">Oluştur</button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>

