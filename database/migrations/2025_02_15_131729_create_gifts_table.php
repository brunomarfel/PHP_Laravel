<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     //Comando: php artisan make:migration create_gifts_table

    public function up(): void
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->id(); //aparece por defeito
            $table->string('name');
            $table->double('estimated_value');
            $table->double('spent_value');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps(); ////aparece por defeito
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gifts');
    }
};


