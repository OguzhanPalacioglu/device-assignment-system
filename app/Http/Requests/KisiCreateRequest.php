<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KisiCreateRequest extends FormRequest
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
            'ad_soyad'=>'required|unique:kisilers|min:4|max:40|',
            'kadro'=>'required|in:Yönetim,İdari,Anaokulu,İlköğretim,Lise,Destek,Boş',
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
