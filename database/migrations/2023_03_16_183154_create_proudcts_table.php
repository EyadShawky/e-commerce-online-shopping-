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
        Schema::create('proudcts', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->float('price');
            $table->string('product_name' , 100);
            $table->string('img' , 100)->nullable();
            $table->foreignId('categories_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proudcts');
    }
};
