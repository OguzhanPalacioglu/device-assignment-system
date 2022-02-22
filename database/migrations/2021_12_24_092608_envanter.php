<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Envanter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envanters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kisi_id')->nullable();   
            $table->string('urun_cesidi');
            $table->string('urun_marka');
            $table->string('urun_model');
            $table->string('urun_ozellik')->nullable();
            $table->string('seri_no')->nullable();   
            $table->enum('okul',['İdari','Lise','İlköğretim','Anaokulu','Yönetim','Destek']);
            $table->timestamps();
            $table->foreign('kisi_id')->nullable()->references('id')->on('kisilers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('envanters');
    }
}
