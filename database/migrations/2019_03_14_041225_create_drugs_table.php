<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->bigIncrements('id'); // Первичный ключ
            $table->text('title'); // Название препарата
            $table->unsignedInteger('provider_id'); // Ключ поставщика
            $table->unsignedInteger('category_id'); // Ключ категории препарата
            $table->text('measure'); // Единица измерения/фасовки
            $table->float('price'); // Цена в рублях
//          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drugs');
    }
}
