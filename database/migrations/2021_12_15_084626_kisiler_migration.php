<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KisilerMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kisilers', function (Blueprint $table) {
            $table->id();
            $table->string ('ad_soyad',100);
            $table->enum('kadro',['İdari','Anaokulu','İlköğretim','Lise','Destek','Yönetim']);
            $table->string ('birim_zumre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kisilers');
    }
}
