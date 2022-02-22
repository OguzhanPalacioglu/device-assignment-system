<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnvanterCreateRequest extends FormRequest
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
            'urun_cesidi'=>'required|min:2',
            'urun_marka'=>'required',
            'urun_model'=>'min:2',
            'urun_ozellik'=>'min:2|nullable',
            'okul'=>'required|in:Yönetim,İdari,Anaokulu,İlköğretim,Lise,Destek',
            'seri_no'=>'min:2|unique:envanters|nullable'.$this->id,
        ];
        
    }
    public function attributes(){
        return[
        'urun_cesidi'=> 'Ürün Çeşidi',
        'urun_marka'=> 'Ürün Marka',
        'urun_model'=> 'Ürün Modeli',
        'urun_ozellik'=>'Özellik',
        'okul'=> 'Envanter Bilgisi "Yönetim, İdari, Anaokulu, İlköğretim, Lise ve Destek" değerlerinden biri olmalıdır. Girdi ',
        'seri_no'=> 'Seri No',
        ];
    }
}
