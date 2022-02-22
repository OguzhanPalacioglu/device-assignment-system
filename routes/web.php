<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KisilerController;
use App\Http\Controllers\Admin\EnvanterController;
use App\Http\Controllers\Admin\ZimmetController;
use App\Http\Controllers\Admin\ZimmettenCikar;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth'], function (){
    Route::get('/',[MainController::class,'dashboard'])->name('dashboard');
  //  Route::get('search',[MainController::class,'aramayap'])->name('aramayapname');
});   


// Aşağıdaki route grubunda yetkisi olmayan kullanıcının belli yerlere girmesini kısılıyorum ve admin prefixi veriyorum.
Route::group(['middleware' => ['auth','isAdmin','verified'],'prefix' => 'admin' ], function (){

    
    Route::get('anaokulukadro',[KisilerController::class,'anaokulukadrogoster'])->name('anaokulukadroname');
    Route::get('ilkogretimkadro',[KisilerController::class,'ilkogretimkadrogoster'])->name('ilkogretimkadroname');
    Route::get('idarikadro',[KisilerController::class,'idarikadrogoster'])->name('idarikadroname');
    Route::get('destekkadro',[KisilerController::class,'destekkadrogoster'])->name('destekkadroname');
    Route::get('lisekadro',[KisilerController::class,'lisekadrogoster'])->name('lisekadroname');
    Route::get('yonetimkadro',[KisilerController::class,'yonetimkadrogoster'])->name('yonetimkadroname'); 
    Route::get('tumkadro',[KisilerController::class,'tumkadrogoster'])->name('tumkadroname'); 
    Route::get('envanterbos',[EnvanterController::class,'envanterbosta'])->name('envanterbosname');
    Route::get('ilkortaenvanter',[EnvanterController::class,'ilkortaenvanter'])->name('ilkortaenvantername');
    Route::get('anaokuluenvanter',[EnvanterController::class,'anaokuluenvanter'])->name('anaokuluenvantername');
    Route::get('liseenvanter',[EnvanterController::class,'liseenvanter'])->name('liseenvantername');
    Route::get('idarienvanter',[EnvanterController::class,'idarienvanter'])->name('idarienvantername');
    Route::get('destekenvanter',[EnvanterController::class,'destekenvanter'])->name('destekenvantername');
    
    Route::get('/export',[MainController::class,'export'])->name('exportname');
    

    //Kişi Silmek için aşağıdaki get methodunu kullanıyorum. Resource route'ndan önce yazmamın sebebi o koda gitmeden önce destroy methodunu kullanabilsin.
    //Route çalışması için mutlaka number olması lazım whereNumber bu işe yarıyor.
    Route::get('kisiler/{id}',[KisilerController::class,'destroy'])->whereNumber('id')->name('kisiler.destroy');
    //Kişi,envanter,zimmet eklemek için aşağıdaki resource route tanımlaması KisilerController'daki fonksiyonları kullanmamızı sağlıyor.
    Route::resource('kisiler',KisilerController::class);
    //Envanter Silmek için aşağıdaki get methodunu kullanıyorum. Resource route'ndan önce yazmamın sebebi o koda gitmeden önce destroy methodunu kullanabilsin.
    //Route çalışması için mutlaka number olması lazım whereNumber bu işe yarıyor.
    Route::get('envanter/{id}',[EnvanterController::class,'destroy'])->whereNumber('id')->name('envanter.destroy');
    Route::resource('envanter',EnvanterController::class);
    Route::resource('zimmetsil',ZimmettenCikar::class);
    Route::resource('zimmet',ZimmetController::class);
});

Route::group(['middleware' => ['auth','isLise'],'prefix' =>'lise' ], function (){
    Route::get('lisekadro',[KisilerController::class,'lisekadroyonetici'])->name('lisekadroyoneticiname');
    Route::get('export',[MainController::class,'liseexport'])->name('liseexportname');
    Route::get('bosenvanter',[EnvanterController::class,'lisebosenvanter'])->name('lisebosenvantername');

});    

Route::group(['middleware' => ['auth','isAnaokulu'],'prefix' =>'anaokulu' ], function (){
    Route::get('anaokulukadro',[KisilerController::class,'anaokulukadroyonetici'])->name('anaokuluadroyoneticiname');
    Route::get('export',[MainController::class,'anaokuluexport'])->name('anaokuluexportname');
    Route::get('bosenvanter',[EnvanterController::class,'anaokulubosenvanter'])->name('anaokulubosenvantername');

});   

Route::group(['middleware' => ['auth','isIlkorta'],'prefix' =>'ilkorta' ], function (){
    Route::get('anaokulukadro',[KisilerController::class,'anaokulukadroyonetici'])->name('ilkortakadroyoneticiname');
    Route::get('export',[MainController::class,'ilkortaexport'])->name('ilkortaexportname');
    Route::get('bosenvanter',[EnvanterController::class,'ilkogretimbosenvanter'])->name('ilkogretimbosenvantername');

});   

    