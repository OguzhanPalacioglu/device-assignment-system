<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KisiUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'ad_soyad'=>'required|min:4|max:40|',
            'kadro'=>'required|in:Yönetim,İdari,Anaokulu,İlköğretim,Lise,Destek',
            'birim_zumre'=>'required',
        ];
    }
    public function attributes(){
        return[
        'ad_soyad'=> 'Ad Soyad',
        'kadro'=> 'Kadro Bilgisi "Yönetim, İdari, Anaokulu, İlköğretim, Lise ve Destek" değerlerinden biri olmalıdır. Girdi ',
        'birim_zumre'=> 'Birim/Zümre',
        ];
    }
}

