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
        //
        Schema::create('category', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name', 92);
            $table->timestamps();
        });

        Schema::create('tech', function(Blueprint $table){
            $table->integerIncrements('id');
            $table->string('name', 46);
            $table->unsignedInteger('category_id');
            $table->timestamps();
            
            $table->foreign('category_id')
                  ->references('id')
                  ->on('category')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tech');
        Schema::dropIfExists('category');
    }
};
