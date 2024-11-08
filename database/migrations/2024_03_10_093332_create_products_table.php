<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('product_name');
            $table->text('product_short_description');
            $table->text('product_long_description')->nullable();
            $table->boolean('for_landing')->default(false);
            $table->string('slug')->index();
            $table->integer('position')->default(100);
            $table->boolean('active')->default(true);
            $table->boolean('promotion')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
