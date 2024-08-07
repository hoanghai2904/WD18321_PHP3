<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_comment', function (Blueprint $table) {
            $table->increments('id');
            //int khong am
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('product_id');
            $table->string('comment',500);
            // gan khoa ngoai
            // ondelete xoa thang cha thi thang con cung bi xoa 
            // vd id = 1 thi product id = 1 cung bi xoa 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_comment');

    }
};
