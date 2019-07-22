<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->integer('product_price');//tien
            $table->string('product_img');
            $table->string('product_war');//bao hanh
            $table->string('product_pk');//phu kien
            $table->string('product_tt');//tinh trang
            $table->string('product_km');//khuyen mai
            $table->tinyInteger('product_trangthai');//trang thai
            $table->integer('product_cate')->unsigned();
            $table->foreign('product_cate')->references('cate_id')->on('vp_categoris')->onDelete('cascade');
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
        Schema::dropIfExists('vp_products');
    }
}
