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
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',200);
            $table->float('price',8,2);
            $table->integer('view');
            $table->timestamps(); 
            // timestamps se la created_at va updated_at , mac dinh timestamps se la null
        });
    }

    /**
     * Reverse the migrations.
     */
    // php artisan migrate:rollback | reset
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
