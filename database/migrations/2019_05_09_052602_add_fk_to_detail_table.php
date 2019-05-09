<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail', function (Blueprint $table) {
            $table->unsignedInteger('produk_id');
            $table->unsignedInteger('kategori_id');

            $table->foreign('produk_id')->references('id')->on('produk')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail', function (Blueprint $table) {
            //
        });
    }
}
