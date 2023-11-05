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
        Schema::create('home_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('header_logo')->nullable();
            $table->string('mobile_header_logo')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('hot_line')->nullable();
            $table->text('address')->nullable();
            $table->text('map')->nullable();
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('tiktok')->nullable();
            $table->text('pintrest')->nullable();
            $table->text('youtube')->nullable();
            $table->text('privacy_policy')->nullable();
            $table->text('terms')->nullable();
            $table->text('copy-right')->nullable();
            $table->text('footer_logo')->nullable();
            $table->text('mobile_footer_logo')->nullable();
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
        Schema::dropIfExists('home_page_settings');
    }
};
