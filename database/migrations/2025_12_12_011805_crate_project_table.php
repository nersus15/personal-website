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
        Schema::create('project', function(Blueprint $table){
            $table->integerIncrements('id');
            $table->string('name', 46);
            $table->string('stack', 150);
            $table->string('position', 92);
            $table->string('image', 15)->nullable();
            $table->string('link', 92)->nullable();
            $table->string('repo', 92)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('project');
    }
};
