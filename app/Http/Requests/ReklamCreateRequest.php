<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReklamCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'baslik'=>'required | min:3 | max:200',
            'aciklama'=>'required| min:3 | max:600',
            'siteurl'=>'required',
            'maliyet'=>'required | numeric',
            'gunluk_limit'=>'required'

        ];
    }
    public function attributes(){
        return [
            'baslik'=>'Reklam Başlığı',
            'aciklama'=>'Reklam Açıklaması',
            'siteurl'=>'Site Adresi',
            'maliyet'=>'Reklam Maliyeti',
            'gunluk_limit'=>'Günlük Gösterme Limiti'
        ];
    }
}
