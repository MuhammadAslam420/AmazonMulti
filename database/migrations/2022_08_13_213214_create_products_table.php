<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->string('name');
            $table->string('slug');
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('SKU');
            $table->decimal('price')->default(0);
            $table->decimal('discount')->default(0);
            $table->integer('quantity')->default(10);
            $table->integer('sale_quantity')->default(0);
            $table->string('front_image');
            $table->string('back_image');
            $table->string('gallery');
            $table->decimal('deals')->default(0);
            $table->decimal('special_offer')->default(0);
            $table->enum('status',[1,0,2])->default(0);
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
        Schema::dropIfExists('products');
    }
};
